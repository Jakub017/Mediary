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

    public function updateBasic(Request $request) {
        
    }

    
}
