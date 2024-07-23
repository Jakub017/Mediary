<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(PagesController::class)->group(function() {
    Route::get('/', 'home')->name('home');
});

Route::controller(AppController::class)->group(function() {
    Route::get('/pulpit', 'dashboard')->name('dashboard');
    Route::get('/profil-pacjenta', 'profile')->name('profile');
    Route::post('/aktualizuj-dane', 'updateBasic')->name('update-basic');    
    Route::get('/badania-krwi', 'blood')->name('blood');
    Route::post('/wyslij-badania-krwi', 'bloodTest')->name('blood-test');
});

require __DIR__.'/auth.php';
