<?php

namespace App\Http\Controllers;

use App\Models\Diet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class DietController extends Controller
{
    public function index() {
        $pageTitle = 'Dieta';
        $diets = Diet::where('user_id', Auth::id())->get();
        $trashedDiets = Diet::onlyTrashed()->where('user_id', Auth::id())->get();
        return view('app.diet', compact('pageTitle', 'diets', 'trashedDiets'));
    }

    public function store(Request $request) {

        $data = $request->validate([
            'diet_name' => 'required|max:64',
            'diet_kcal' => 'required',
            'meals_count' => 'required',
            'diet_type' => 'required',
            'diet_other_notes' => '',
            'diet_like' => '',
            'diet_not_like' => '',
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
Typ diety, który masz mi ułożyć to: ' . $data['diet_type'] . ' Moje stwierdzone choroby to: '. auth()->user()->diseases .'. 
Moje preferencje co do diety to: ilość posiłków: ' . $data['meals_count'] . ', ilość kalorii: ' . $data['diet_kcal'] . ' kcal, 
lubię jeść: ' . $data['diet_like'] . '. 
Nie lubię jeść i pomiń to w układaniu diety: ' . $data['diet_not_like'] . '. 
Moje pozostałe uwagi co do diety: ' . $data['diet_other_notes'] . '. 
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

        return redirect()->route('diet.index');
    }

    public function delete(Diet $diet) {
        $diet->delete();
        return redirect()->route('diet.index');
    }

    public function forceDelete(Diet $diet) {
        $diet->forceDelete();
        return redirect()->route('diet.index');
    }
}
