<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $google_user = Socialite::driver('google')->user();

        $user = User::updateOrCreate([
            'email' => $google_user->email,
        ], [
            'name' => $google_user->name,
            'email' => $google_user->email,
            'password' => Hash::make(Str::random(40)),
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
