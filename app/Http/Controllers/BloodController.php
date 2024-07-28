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
                    'content' => 'Mam '. auth()->user()->age .' lata, ważę ' . auth()->user()->weight . 'i mam '. auth()->user()->height .'cm wzrostu. Moja płeć to '. auth()->user()->gender .'. Oto moje badania i parametry: '. json_encode($data) . '. Najpierw daj jeden akapit podsumowania (Samo podsumowanie musi miec dokładnie 40 słów, zacznij je od pogrubionego słowa "Podsumowanie".), a następnie w formie listy wypisz lekarzy specjalistów specjalistów (ich nazwy niech są pogrubione), do jakich mam się udac wraz z krótkim uzasadnieniem (kazde uzasadnienie minimium 30 słów równo). Nic więcej nie pisz oprócz tego o co cię proszę. Odpowiedź MUSI być w formie HTML. Odpowiedz ma byc w takiej dokladnie formie: <p><b>Podsumowanie</b>: Podsumowanie </p><br> <ul class="flex flex-col gap-2"><li><b>Lekarz n</b>: Uzasadnienie n</li> <li><b>Lekarz n+1</b>: Uzasadnienie n+1</li> <li><b>Lekarz n+2</b>: Uzasadnienie n+2</li> i tak dalej. Wypisz tyle lekarzy ile trzeba konkretnie dla mnie.</ul>. Nie dodawaj zadnych swoich styli.',
                ]
            ]
        ]);

        $data['blood_recommendations'] = $response->json()['choices'][0]['message']['content'];
        
        $user = User::find(Auth::id());
        $user->update($data);

        return redirect()->route('blood.index');
    }
}
