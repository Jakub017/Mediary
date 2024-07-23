<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Diet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AppController extends Controller
{
    public function dashboard() {
        $pageTitle = 'Pulpit';
        return view('app.dashboard', compact('pageTitle'));
    }

    public function blood() {
        $pageTitle = 'Badania krwi';
        return view('app.blood', compact('pageTitle'));
    }

    public function profile() {
        $pageTitle = 'Profil pacjenta';
        return view('app.profile', compact('pageTitle'));
    }

    public function diet() {
        $pageTitle = 'Dieta';
        $diets = Diet::where('user_id', Auth::id())->get();
        return view('app.diet', compact('pageTitle', 'diets'));
    }

    public function createDiet(Request $request) {
        ini_set('max_execution_time', 300);


        $data = $request->validate([
            'name' => 'required|max:255',
            'kcal' => 'required',
            'dishes_count' => 'required',
            'like' => '',
            'not_like' => '',
        ]);

        $data['user_id'] = Auth::id();

        $apiKey = env('OPENAI_API_KEY');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'Content-Type' => 'application/json',
            ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-4o-mini',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'Jesteś zaawansowanym i wykształconym dietetykiem, otrzymujesz parametry osoby oraz jej preferencje co do diety.'
                ],
                [
                    'role' => 'user',
                    'content' => 'Mam '. auth()->user()->age .' lata, ważę ' . auth()->user()->weight . 'i mam '. auth()->user()->height .'cm wzrostu. Moja płeć to '. auth()->user()->gender .'. Moje preferencje co do diety to: ilość posiłków: '. $data['dishes_count'] .', ilość kalorii: '. $data['kcal'] .'kcal, lubię jeść: '. $data['like'] .'. Nie lubię jeść i pomiń to w układaniu diety: '. $data['not_like'] .'. Odpowiedź ma być w formacie html (nie zawieraj na początku odpowiedzi ```html), w takiej formie:<ul class="list-disc pl-2"><li class="mt-2"><b>Dzień n: </b></li> <p>Posiłek n: treść posiłku</p><p>Posiłek n+1: treść posiłku</p></li></ul>. Dieta ma być rozpisana na 7 dni. Trzymaj się ściśle tego ile chcę zjeść oraz tego co nie lubię. Zaposuj przy posiłkach rozmiary porcji oraz ilość kalorii. Nie pisz nic więcej oprócz tej odpowiedzi.',

                ]
            ]
        ]);

        $data['content'] = $response->json()['choices'][0]['message']['content'];

        Diet::create($data);

        return redirect('/dieta');
    }

    public function deleteDiet(Diet $diet) {
        $diet->delete();
        return redirect('/dieta');
    }

    public function updateBasic(Request $request) {
        $data = $request->validate([
            'gender' => '',
            'weight' => 'numeric',
            'height' => 'numeric',
            'birthday' => 'date',
        ]);

        $data['age'] = Carbon::parse($data['birthday'])->age;
        $user = User::find(Auth::user()->id);
        $user->update($data);
    }

    public function bloodTest(Request $request) {
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

        return redirect('/badania-krwi');
    }
}
