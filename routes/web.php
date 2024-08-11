<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\DietController;
use App\Http\Controllers\BloodController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WorkoutController;



// Webstite routes
Route::controller(PagesController::class)->group(function() {
    Route::get('/', 'home')->name('home');
});

// Application routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::controller(AppController::class)->group(function() {
        Route::get('/pulpit', 'index')->name('index'); 
    });

    Route::controller(ProfileController::class)->group(function() {
        Route::get('/profil-pacjenta', 'index')->name('profile.index');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

     Route::controller(BloodController::class)->group(function() {
        Route::get('/badania-krwi', 'index')->name('blood.index');
        Route::post('/wyslij-badania-krwi', 'store')->name('blood.store');
    });

    Route::controller(DietController::class)->group(function() {
        Route::get('/dieta', 'index')->name('diet.index');
        Route::post('/stworz-diete', 'store')->name('diet.store');
        Route::post('/przywroc-diete/{diet}', 'restore')->name('diet.restore');
        Route::delete('/usun-diete/{diet}', 'destroy')->name('diet.destroy');
        Route::delete('/usun-permanetnie/{diet}', 'forceDestroy')->name('diet.forceDestroy');
    });

    Route::controller(DoctorController::class)->group(function() {
        Route::get('/specjalisci', 'index')->name('doctor.index');
    });

    Route::controller(WorkoutController::class)->group(function() {
        Route::get('/cwiczenia', 'index')->name('workout.index');
    });
});


require __DIR__.'/auth.php';

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
