<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    public function index()
    {
        $pageTitle = 'Ćwiczenia';
        return view('workouts', compact('pageTitle'));
    }
}
