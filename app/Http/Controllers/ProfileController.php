<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{

    public function index(Request $request) {
        $user = $request->user();
        $blood_pressures = $user->blood_pressures()->orderBy('date', 'asc')->get();
        return Inertia('Profile/Index', [
            'blood_pressures' => $blood_pressures,
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
