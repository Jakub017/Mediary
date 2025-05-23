<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use thiagoalessio\TesseractOCR\TesseractOCR;


class FileController extends Controller
{
    public function store(Request $request) {

        $request->validate([
            'file' => 'required|file|max:10240|mimes:pdf,doc,docx',
        ], [
            'file.required' => 'Plik jest wymagany.',
            'file.file' => 'Plik jest wymagany.',
            'file.mimes' => 'Plik musi być w formacie PDF, DOC lub DOCX.',
            'file.max' => 'Plik nie może być większy niż 10MB,',
        ]);

        $user = $request->user();

        if($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('files/'. $user->id, 'public');
            $filename = $file->getClientOriginalName();
            $type = $file->getClientMimeType();
            $size = round($file->getSize() / 1024 / 1024, 2);
            $content = file_get_contents($file->path());
            dd($content);

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
            ]);
        }

        return redirect()->back()->with('success', 'Plik przesłany pomyślnie.');
    }
}
