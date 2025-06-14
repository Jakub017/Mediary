<?php

namespace App\Http\Controllers;

use App\Models\Diet;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class DietController extends Controller
{
    public function index(Request $request)
    {
       return Inertia('Diet/Index', [
            'diets' => $request->user()->diets()->get(),
       ]);
    }

    public function store(Request $request)
    {
        $user = $request->user();

        $data = $request->validate([
            'name' => 'required|max:64',
            'type' => 'required',
            'calories' => 'required',
            'meals' => 'required',
            'like' => 'nullable',
            'dislike' => 'nullable',
            'notes' => 'nullable',
            'documents' => 'nullable',
        ]);

        $api_key = config('services.openai.key');

        // Input building
        $input = 'Jesteś wykształconym dietetykiem. Otrzymujesz informacje od swojego klienta i musisz stworzyć dla niego plan żywieniowy, rozpisać posiłki na cały tydzień. Typ diety to: '. $data['type']. '. Ilość kalorii: '. $data['calories'] .'. Ilość posiłków w ciągu dnia: '. $data['meals'] .'. Klient ma ' . $user->age . ' lat, ma ' . $user->height . 'cm wzrostu i waży ' . $user->weight . 'kg.';

        if($user->diseases) {
            $input .= ' Klient ma stwierdzone następujące choroby: '. $user->diseases .'.';
        }

        if($data['like']) {
            $input .= ' Klient lubi jeść: '. $data['like'] .'. Natomiast nie dodawaj tego przesadnie dużo.';
        }

        if($data['dislike']) {
            $input .= ' Klient nie lubi jeść: '. $data['dislike'] .'. Tego nie dodawaj do diety wcale.';
        }

        if($data['notes']) {
            $input .= ' Klient podał również dodatkowe informacje: '. $data['notes'] .'.';
        }

        if($data['documents']) {
            $reviews = [$user->files()->get()->pluck('review')];
            $input .= ' Klient przesłał również jego dokumentację medyczną, oto opinie specjalisty na ich temat: '. implode('; ', $reviews) .'.';
        }

        $input .= 'Twoja odpowiedź musi być w formie html, bez użycia ``` lub Markdown. Nie dodawaj kodu programistycznego. Zwróć tylko czysty HTML. <div><h3>Dzień tygodnia</h3> <ul><li><b>Nazwa posiłku</b>: treść posiłku (gramatura potrzebnych produktów do wykonania posiłku) - ilosć kalorii</li></ul></div>';

        $input .= ' Dni tygodnia to: Poniedziałek, Wtorek, Środa, Czwartek, Piątek, Sobota, Niedziela. Nazwy posiłku nadaj w zależności od ilości posiłków w ciągu dnia. Jeśli klient wybrał 5, to: Śniadanie, Drugie śniadanie, Obiad, Podwieczorek, Kolacja. Jeśli 4 to: Sniadanie, Obiad, Podwieczorek, Kolacja. Jeśli 3 to: Sniadanie, Obiad, Kolacja.';

        $input .= ' Nie dodawaj żadnych swoich podsumowań, zwróć tylko dietę. Posiłki powinny być zróżnicowane na przestrzeni całego tygodnia. Posiłki muszą być pełnoprawnymi daniami. Nie twórz prostych połączeń typu jabłko z masłem orzechowym. Pamiętaj o wpisaniu w nawiasie przy każdym posiłku gramatury każdego produktu potrzebnego do wykonania dania.';

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $api_key,
            'Content-Type' => 'application/json',
        ])->timeout(60)->post('https://api.openai.com/v1/responses', [
            'model' => 'gpt-4o-mini',
            'input' => $input,
        ])->json();

        $content = $response['output'][0]['content'][0]['text'];

        $user->diets()->create([
            'name' => $data['name'],
            'type' => $data['type'],
            'calories' => $data['calories'],
            'meals' => $data['meals'],
            'like' => $data['like'],
            'dislike' => $data['dislike'],
            'notes' => $data['notes'],
            'documents' => $data['documents'],
            'user_id' => $user->id,
            'content' => $content,
        ]);

        return redirect()->back()->with('success', 'Dieta stworzona pomyślnie.');
    }

    public function destroy(Diet $diet)
    {
        $user = Auth::user();
        $user->diets($diet)->delete();
        return redirect()->back()->with('success', 'Dieta usunieta pomyślnie.');
    }
}
