<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


class BloodController extends Controller
{
    public function index() {
       return Inertia('Blood/Index');
    }

    public function update(Request $request) {
        $user = $request->user();

        $data = $request->validate([
            'wbc' => 'nullable|numeric',
            'rbc' => 'nullable|numeric',
            'hgb' => 'nullable|numeric',
            'hct' => 'nullable|numeric',
            'mcv' => 'nullable|numeric',
            'mch' => 'nullable|numeric',
            'mchc' => 'nullable|numeric',
            'plt' => 'nullable|numeric',
            'rdw_sd' => 'nullable|numeric',
            'rdw_cv' => 'nullable|numeric',
            'pdw' => 'nullable|numeric',
            'mpv' => 'nullable|numeric',
            'p_lcr' => 'nullable|numeric',
            'pct' => 'nullable|numeric',
            'neu' => 'nullable|numeric',
            'lym' => 'nullable|numeric',
            'mono' => 'nullable|numeric',
            'eos' => 'nullable|numeric',
            'baso' => 'nullable|numeric',
            'tsh' => 'nullable|numeric',
            'ast' => 'nullable|numeric',
            'alt' => 'nullable|numeric',
            'bilirubin' => 'nullable|numeric',
            'alp' => 'nullable|numeric',
            'ggtp' => 'nullable|numeric',
            'total_cholesterol' => 'nullable|numeric',
            'hdl_cholesterol' => 'nullable|numeric',
            'non_hdl_cholesterol' => 'nullable|numeric',
            'ldl_cholesterol' => 'nullable|numeric',
            'triglycerides' => 'nullable|numeric',
        ]);

        // Dodać zabezpieczenie, ze jesli nie ma danych to nie wysylamy ich do API

        $apiKey = env('OPENAI_API_KEY');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'Content-Type' => 'application/json',
            ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-4o-mini',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'Jesteś wykształconym lekarzem, otrzymujesz wyniki badania krwi i parametry pacjenta i musisz mu pomóc.'
                ],
                [
                    'role' => 'user',
                    'content' => 'Mam '. $user->age .' lata, ważę ' . $user->weight . ' kg i mam '. $user->height .' cm wzrostu. Moja płeć to '. $user->gender .'. Oto moje badania i parametry: '. json_encode($data) . '. Podaj dokładne podsumowanie (do 60 słów, zaczynając od pogrubionego słowa "Podsumowanie". Każde odchylenia od normy dokładnie wytłumacz) dotyczące moich wyników badań krwi w kontekście mojego wieku, wzrostu, wagi i płci. Następnie wypisz lekarzy specjalistów (ich nazwy niech są pogrubione), do jakich mam się udać wraz z krótkim uzasadnieniem (każde uzasadnienie mas 30 słów równo). Nic więcej nie pisz oprócz tego. Jeśli wszystkie wyniki są w normie, zasugeruj tylko wizytę u lekarza pierwszego kontaktu. Odpowiedź musi być w formie HTML. Odpowiedź ma być w takiej dokładnie formie: <p><b>Podsumowanie</b>: Podsumowanie </p><br> <ul class="flex flex-col gap-2"><li><b>Lekarz n</b>: Uzasadnienie n</li> <li><b>Lekarz n+1</b>: Uzasadnienie n+1</li> <li></li></ul>. n to na początku 1, wypisz tyle lekarzy ile trzeba, jeśli trzeba dwóch to tylko dwóch, jeśli trzeba pięciu to wypisz pięciu, a jeśli czterech to czterech - chodzi o to, żebyś wypisał tyle lekarzy ile faktycznie trzeba. Nie dodawaj żadnych swoich styli. Wypisuj rzeczywiste nazwy lekarzy, nie pisz wymyślonych nazw oraz nie pisz "lekarz 1", "lekarz 2" itd. </p>',
                ]
            ]
        ]);
        
        $data['blood_recommendations'] = $response->json()['choices'][0]['message']['content'];
        Log::info($data['blood_recommendations']);
        
        $user->update($data);

        return back();
    }

    public function pressure(Request $request) {
        $user = $request->user();

        $data = $request->validate([
            'systolic' => 'required|numeric',
            'diastolic' => 'required|numeric',
            'date' => 'required|date',
        ]);

        $apiKey = env('OPENAI_API_KEY');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'Content-Type' => 'application/json',
            ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-4o-mini',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'Jesteś wykształconym lekarzem, otrzymujesz pomiar ciśnienia krwi i na tej podstawie oraz ogólnych parametrach pacjenta musisz wystawić krótką opinię.'
                ],
                [
                    'role' => 'user',
                    'content' => 'Mam '. $user->age .' lata, ważę ' . $user->weight . ' kg i mam '. $user->height .' cm wzrostu. Moja płeć to '. $user->gender .'. Oto moje badania i parametry: '. json_encode($data) . '. Podaj krótką opinię (maksymalnie 10 słów) na temat mojego ciśnienia krwi. Moje ciśnienie krwi to: '. $data['systolic'] .'/'. $data['diastolic'] .'. Jeśli ciśnienie jest prawidłowe, zawsze napisz "Ciśnienie prawidłowe, brak wskazań do obaw." Jeśli coś jest nieprawidłowo, napisz "Ciśnienie skurczowe za niskie/za wysokie/w normie, ciśnienie rozkurczowe za niskie/za wysokie/w normie". Nie pisz, że konsulatacja z lekarzem jest zalecana. Nie powtarzaj też wyniku w swojej odpowiedzi.',
                ]
            ]
        ]);

        $data['review'] = $response->json()['choices'][0]['message']['content'];

        $user->blood_pressures()->create($data);

        return redirect()->back();
    }
}
