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

        $data = $request->validate([
            'name' => 'required|max:255',
            'kcal' => 'required',
            'dishes_count' => 'required',
            'type' => 'required',
            'other_notes' => '',
            'like' => '',
            'not_like' => '',
        ]);

        $data['user_id'] = Auth::id();

        $apiKey = env('OPENAI_API_KEY');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'Content-Type' => 'application/json',
            ])->timeout(300)->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-4o-mini',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'Jesteś zaawansowanym i wykształconym dietetykiem, otrzymujesz parametry osoby oraz jej preferencje co do diety.'
                ],
                [
                    'role' => 'user',
                    'content' => 'Mam ' . auth()->user()->age . ' lat, ważę ' . auth()->user()->weight . ' kg i mam ' . auth()->user()->height . ' cm wzrostu. Moja płeć to ' . auth()->user()->gender . '. 
Typ diety, który masz mi ułożyć to: ' . $data['type'] . '. 
Moje preferencje co do diety to: ilość posiłków: ' . $data['dishes_count'] . ', ilość kalorii: ' . $data['kcal'] . ' kcal, 
lubię jeść: ' . $data['like'] . '. 
Nie lubię jeść i pomiń to w układaniu diety: ' . $data['not_like'] . '. 
Moje pozostałe uwagi co do diety: ' . $data['other_notes'] . '. 
Odpowiedź ma być w formacie HTML (nie zawieraj na początku odpowiedzi ```html), w takiej formie:
<p class="mb-2 font-semibold">Lista zakupów na cały tydzień:</p>
<ul class="list-disc pl-2">
    <li class="mt-2"><b>Dzień n:</b></li>
    <p>- Rzecz n: ilość rzeczy (w gramach, sztukach itd. zależnie od produktu)</p>
    <p>- Rzecz n+1: ilość rzeczy (w gramach, sztukach itd. zależnie od produktu)</p>
</ul>
Następnie masz wygenerować dietę.
<p class="mb-2 mt-6 font-semibold">Twoja dieta:</p>
<ul class="list-disc pl-2">
    <li class="mt-2"><b>Dzień n:</b></li>
    <p>- Posiłek n: treść dania</p>
    <p>- Posiłek n+1: treść dania</p>
</ul>
Dieta ma być rozpisana na 7 dni i ma być ZBILANSOWANA, nie może być tak, że rozpisujesz 12 jajek codziennie na przykład, ani 700 g płatków każdego dnia. Trzymaj się ściśle tego, ile chcę zjeść oraz tego, czego nie lubię, oraz oczywiście typu diety. To co lubię jeść traktuj tylko jako delikatną sugestię - np. jeśli lubię jabłka to nie wpisuj 7 jabłek każdego dnia, żeby tylko dopchnąć kalorie, to ma być delikatna sugestia. Zapisuj przy posiłkach rozmiary porcji oraz ilość kalorii. Posiłki to mają być potrawy, dania do przygotowania, a nie same składniki. Lista zakupów ma być dokładna. Każde danie powinno mieć nazwę, np. "Pieczony łosoś z warzywami" zamiast "Łosoś (200 g), brokuły (150 g)". Staraj się, aby dania były atrakcyjne wizualnie i smakowo. Przepisy NIE MOGĄ się powtarzać. W jednym dniu nie mogą się powtarzać za bardzo potrawy, czyli nie może być np. "Tuńczyk z ryżem basmati" i "Tuńczyk w sałatce" jednego dnia.

Jeśli ilość posiłków to 3, nazwy posiłków to:
1. Śniadanie
2. Obiad
3. Kolacja

Jeśli ilość posiłków to 4, nazwy posiłków to:
1. Śniadanie
2. Drugie śniadanie
3. Obiad
4. Kolacja

Jeśli ilość posiłków to 5, nazwy posiłków to:
1. Śniadanie
2. Drugie śniadanie
3. Obiad
4. Podwieczorek
5. Kolacja

Nazwy posiłków są ważne, potrawy mają być dopasowane do tych nazw, pory jedzenia takie jak ogólnie przyjęte.

Upewnij się, że składniki są zróżnicowane i dobrze zbilansowane w ciągu tygodnia, aby uniknąć nadmiernego spożycia jednego rodzaju produktu. Na przykład, nie rozpisuj 700 g płatków owsianych każdego dnia. Wprowadź różnorodność w składnikach śniadaniowych, obiadowych i kolacyjnych. Listy zakupowe maja byc dokladne i bez bledow, dopasowane do danego dnia. Nie moze byc tak, np. wpisujesz na dzien 1 300g lososia, a potem go nie uzywasz tego 1 dnia. Nie rozpisuj w diecie alkoholu, nawet 0%. Dieta ma byc rowniez wywazona cenowo, ma byc dostepna dla wiekszosci osob, nie rozpisuj zatem za duzo roznych drozszych, premium produktow zwlaszcza w diecie klasycznej.'


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
