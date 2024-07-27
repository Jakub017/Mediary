<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(PagesController::class)->group(function() {
    Route::get('/', 'home')->name('home');
});

Route::controller(AppController::class)->group(function() {
    Route::get('/pulpit', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/profil-pacjenta', 'profile')->middleware(['auth', 'verified'])->name('profile');
    Route::get('/badania-krwi', 'blood')->middleware(['auth', 'verified'])->name('blood');
    Route::get('/dieta', 'diet')->middleware(['auth', 'verified'])->name('diet');
    Route::get('/specjalisci', 'doctors')->middleware(['auth', 'verified'])->name('doctors');
    Route::get('/cwiczenia', 'workouts')->middleware(['auth', 'verified'])->name('workouts');

    Route::post('/aktualizuj-dane', 'updateBasic')->middleware(['auth', 'verified'])->name('update-basic');    
    Route::post('/wyslij-badania-krwi', 'bloodTest')->middleware(['auth', 'verified'])->name('blood-test');
    Route::post('/stworz-diete', 'createDiet')->middleware(['auth', 'verified'])->name('create-diet');
    Route::delete('/usun-diete/{diet}', 'deleteDiet')->middleware(['auth', 'verified'])->name('delete-diet');
});

require __DIR__.'/auth.php';
