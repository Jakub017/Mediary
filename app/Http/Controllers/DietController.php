<?php

namespace App\Http\Controllers;

use App\Models\Diet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DietController extends Controller
{
    public function index()
    {
        $pageTitle = 'Dieta';
        $diets = Diet::where('user_id', Auth::id())->get();
        $trashedDiets = Diet::onlyTrashed()->where('user_id', Auth::id())->get();
        return view('diet', compact('pageTitle', 'diets', 'trashedDiets'));
    }

    public function store(Request $request)
    {

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

        $data['content'] = $response->json()['choices'][0]['message']['content'];

        Diet::create($data);

        return redirect()->route('diet.index');
    }

    public function restore($id)
    {
        $diet = Diet::withTrashed()->where('id', $id)->restore();
        return redirect()->route('diet.index');
    }

    public function destroy(Diet $diet)
    {
        $diet->delete();
        return redirect()->route('diet.index');
    }

    public function forceDestroy($id) 
    {
        $diet = Diet::withTrashed()->where('id', $id)->first();
        $diet->forceDelete();
        return redirect()->route('diet.index');
    }
}
