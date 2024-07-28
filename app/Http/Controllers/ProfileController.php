<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{

    public function index() {
        $pageTitle = 'Profil pacjenta';
        return view('app.profile', compact('pageTitle'));
    }
     
    public function update(Request $request)
    {
        // $request->user()->fill($request->validated());

        // if ($request->user()->isDirty('email')) {
        //     $request->user()->email_verified_at = null;
        // }

        // $request->user()->save();
        
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

        // return Redirect::route('profile.edit')->with('status', 'profile-updated');
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
