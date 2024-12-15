<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index() {
        $pageTitle = 'Specjaliści';
        return view('doctors', compact('pageTitle'));
    }
}
