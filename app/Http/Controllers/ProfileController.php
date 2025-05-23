<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{

    public function index(Request $request) {
        $user = $request->user();
        $blood_pressures = $user->blood_pressures()->orderBy('date', 'asc')->get();
        $files = $user->files()->orderBy('created_at', 'desc')->get();
        
        return Inertia('Profile/Index', [
            'blood_pressures' => $blood_pressures,
            'files' => $files,
        ]);
    }
     
    public function update(Request $request)
    {        
        $data = $request->validate([
            'gender' => 'nullable|string',
            'weight' => 'nullable|numeric',
            'height' => 'nullable|numeric',
            'birthday' => 'nullable|date',
            'diseases' => 'nullable|string',
        ]);

        $data['age'] = Carbon::parse($data['birthday'])->age;
        $user = $request->user();
        $user->update($data);

        if(!empty($data['weight'])) {
            $user->weights()->create([
                'weight' => $data['weight'],
                'date' => Carbon::today(),
            ]);
        }

        $height_in_meters = $data['height'] / 100;
        $min_weight = round(18.5 * ($height_in_meters * $height_in_meters), 1);
        $max_weight = round(24.9 * ($height_in_meters * $height_in_meters), 1);
        $user->proper_weight = $min_weight . 'kg - '. $max_weight . 'kg';
        $user->save();

        return redirect()->route('profile.index');
    }

   
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
