<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PagesController extends Controller
{
    public function index() {
        return view('index');
    }

    public function bloodTest(Request $request) {

    $data = $request->validate([
        'weight' => 'required|numeric',
        'height' => 'required|numeric',
        'age' => 'required|numeric',
        'gender' => 'required',
        'hgb' => 'required|numeric',
        'rbc' => 'required|numeric',
        'hct' => 'required|numeric',
        'mcv' => 'required|numeric',
        'mch' => 'required|numeric',
        'mchc' => 'required|numeric',
        'rdw' => 'required|numeric',
        'wbc' => 'required|numeric',
        'plt' => 'required|numeric',
        'mpv' => 'required|numeric',
        'pdw' => 'required|numeric',
    ]);

    $apiKey = env('OPENAI_API_KEY');
    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . $apiKey,
        'Content-Type' => 'application/json',
    ])->post('https://api.openai.com/v1/chat/completions', [
        'model' => 'gpt-3.5-turbo',
        'messages' => [
            [
                'role' => 'system',
                'content' => 'Jesteś zaawansowanym i wykształconym lekarzem, otrzymujesz wyniki badania krwi i parametry pacjenta i musisz mu pomóc.'
            ],
            [
                'role' => 'user',
                'content' => 'Oto moje badania i parametry: '. json_encode($data) . '. Wypisz mi od myślników lekarzy, do których mogę się udac na podstawie wyników z krótkim wyjaśnieniem. Nic wiecej nie zapisuj. Odpowiedź w formie html.'
            ]
        ]
    ]);

    $response = $response->json()['choices'][0]['message']['content'];

    return view('blood-test', ['response' => $response, 'data' => $data]);

    }
}
