<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class BloodController extends Controller
{
    public function index() {
        $pageTitle = 'Badania krwi';
        return view('app.blood', compact('pageTitle'));
    }

    public function store(Request $request) {
       $data = $request->validate([
            'wbc' => 'numeric',
            'rbc' => 'numeric',
            'hgb' => 'numeric',
            'hct' => 'numeric',
            'mcv' => 'numeric',
            'mch' => 'numeric',
            'mchc' => 'numeric',
            'plt' => 'numeric',
            'rdw_sd' => 'numeric',
            'rdw_cv' => 'numeric',
            'pdw' => 'numeric',
            'mpv' => 'numeric',
            'p_lcr' => 'numeric',
            'pct' => 'numeric',
            'neu' => 'numeric',
            'lym' => 'numeric',
            'mono' => 'numeric',
            'eos' => 'numeric',
            'baso' => 'numeric',
            'tsh' => 'numeric',
            'ast' => 'numeric',
            'alt' => 'numeric',
            'bilirubin' => 'numeric',
            'alp' => 'numeric',
            'ggtp' => 'numeric',
            'total_cholesterol' => 'numeric',
            'hdl_cholesterol' => 'numeric',
            'non_hdl_cholesterol' => 'numeric',
            'ldl_cholesterol' => 'numeric',
            'triglycerides' => 'numeric',
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
                    'content' => 'Jesteś zaawansowanym i wykształconym lekarzem, otrzymujesz wyniki badania krwi i parametry pacjenta i musisz mu pomóc.'
                ],
                [
                    'role' => 'user',
                    'content' => 'Mam '. auth()->user()->age .' lata, ważę ' . auth()->user()->weight . ' kg i mam '. auth()->user()->height .' cm wzrostu. Moja płeć to '. auth()->user()->gender .'. Oto moje badania i parametry: '. json_encode($data) . '. Podaj dokładne podsumowanie (dokładnie 40 słów, zaczynając od pogrubionego słowa "Podsumowanie".) dotyczące moich wyników badań krwi w kontekście mojego wieku, wzrostu, wagi i płci. Następnie wypisz lekarzy specjalistów (ich nazwy niech są pogrubione), do jakich mam się udać wraz z krótkim uzasadnieniem (każde uzasadnienie minimum 30 słów równo). Nic więcej nie pisz oprócz tego, o co cię proszę. Odpowiedź MUSI być w formie HTML. Odpowiedź ma być w takiej dokładnie formie: <p><b>Podsumowanie</b>: Podsumowanie </p><br> <ul class="flex flex-col gap-2"><li><b>Lekarz n</b>: Uzasadnienie n</li> <li><b>Lekarz n+1</b>: Uzasadnienie n+1</li> <li></li></ul>. n to na początku 1, wypisz tyle lekarzy ile trzeba, jeśli trzeba dwóch to tylko dwóch, jeśli trzeba pięciu to wypisz pięciu, a jeśli czterech to czterech - chodzi o to, żebyś wypisał tyle lekarzy ile faktycznie trzeba. Nie dodawaj żadnych swoich styli.',
                ]
            ]
        ]);

        $data['blood_recommendations'] = $response->json()['choices'][0]['message']['content'];
        
        $user = User::find(Auth::id());
        $user->update($data);

        return redirect()->route('blood.index');
    }
}
