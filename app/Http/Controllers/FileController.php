<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class FileController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'file' => 'required|file|max:10240|mimes:pdf,doc,docx',
        ], [
            'file.required' => 'Plik jest wymagany.',
            'file.file' => 'Plik jest wymagany.',
            'file.mimes' => 'Plik musi być w formacie .pdf, .doc lub .docx.',
            'file.max' => 'Plik nie może być większy niż 10MB,',
        ]);

        $user = $request->user();

        if($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('files/'. $user->id, 'public');
            $filename = $file->getClientOriginalName();
            $type = $file->getClientMimeType();
            $size = round($file->getSize() / 1024 / 1024, 2);

            // File reading
            $parser = new \Smalot\PdfParser\Parser();
            $pdf = $parser->parseFile($file->getRealPath());
            $text = $pdf->getText();

            // OpenAI
            $api_key = env('OPENAI_API_KEY');
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $api_key,
                'Content-Type' => 'application/json',
            ])->post('https://api.openai.com/v1/responses', [
                'model' => 'gpt-4o-mini',
                'input' => 'Jesteś wykształconym lekarzem, otrzymujesz dokument od pacjenta. Pacjent ma '. $user->age .' lat, waży ' . $user->weight . ' kg i ma '. $user->height .' cm wzrostu. Płeć pacjenta to '. $user->gender .'. Stwierdzone choroby pacjenta to: '. $user->deseases .'. Jeśli chorób nie ma to nie bierz ich pod uwagę. Treść przesłanego dokumentu: '. $text . '. Napisz podsumowanie (około 150 słów) na podstawie treści przesłanego dokumentu. Podsumowanie zapisz w języku polskim. Do akapitów używaj tylko tagów html <p></p> (podziel swoją odpowiedź na 2/3 akapity dla lepszej czytelności). Ważne informacje, nazwy możesz zawierać w tagach <b></b>. Nie pisz swoich zaleceń. Pisz tylko suche fakty wynikające z pliku oraz profilu pacjenta. Zwracaj się do pacjenta na "ty".'
            ]);
            
            $review = $response->json()['output'][0]['content'][0]['text'];

            if($type == 'application/pdf') {
                $type = 'pdf';
            } elseif($type == 'application/msword' || $type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
                $type = 'doc';
            }

            $user->files()->create([
                'path' => $path,
                'filename' => $filename,
                'type' => $type,
                'size' => $size,
                'review' => $review,
            ]);
        }

        Cache::forget('files_'.$user->id);

        return redirect()->back()->with('success', 'Plik przesłany pomyślnie.');
    }

    public function show(Request $request, $id) 
    {
        $user = $request->user();
        $file = $user->files()->find($id);
        return Inertia('Files/Show', [
            'file' => $file,
        ]);
    }
}
