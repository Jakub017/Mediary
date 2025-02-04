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

    public function index() {
        return Inertia('Profile/Index');
    }

    public function show(Request $request) {
        $pageTitle = 'Ustawienia profilu';
        $user = $request->user();
        return view('profile.show', compact('pageTitle', 'request', 'user'));
    }
     
    public function update(Request $request)
    {        
        $data = $request->validate([
            'gender' => 'nullable|string',
            'weight' => 'numeric',
            'height' => 'numeric',
            'birthday' => 'date',
            'diseases' => 'nullable|string',
            'location' => 'nullable|string',
        ]);

        $data['age'] = Carbon::parse($data['birthday'])->age;
        $user = User::find(Auth::user()->id);
        $user->update($data);

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
