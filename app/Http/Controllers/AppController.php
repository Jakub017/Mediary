<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function dashboard(Request $request) 
    {
        $user = $request->user();
        $files = $user->files()->orderBy('created_at', 'desc')->limit(5)->get();
        $weights = $user->weights()->orderBy('date', 'desc')->limit(5)->pluck('weight');
        $dates = $user->weights()->orderBy('date', 'desc')->limit(5)->pluck('date');

        $dates = $dates->map(function ($date) {
            return Carbon::parse($date)->format('d.m');
        });

        $systolics = $user->blood_pressures()->orderBy('date', 'asc')->limit(5)->pluck('systolic');
        $diastolics = $user->blood_pressures()->orderBy('date', 'asc')->limit(5)->pluck('diastolic');
        $blood_dates = $user->blood_pressures()->orderBy('date', 'asc')->limit(5)->pluck('date');
        $last_pressure = $user->blood_pressures()->orderBy('date', 'desc')->first();

        $blood_dates = $blood_dates->map(function ($date) {
            return Carbon::parse($date)->format('d.m');
        });

        return Inertia('Dashboard', [
            'weights' => $weights,
            'dates' => $dates,
            'systolics' => $systolics,
            'diastolics' => $diastolics,
            'blood_dates' => $blood_dates,
            'last_pressure' => $last_pressure,
            'files' => $files,
        ]);
    }    
}
