<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\AppController;
use App\Http\Controllers\DietController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\BloodController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::controller(GoogleController::class)->group(function() {
    Route::get('/auth/google/redirect', 'redirect')->name('google.redirect');
    Route::get('/auth/google/callback', 'callback')->name('google.callback');
});

Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified', ])->group(function () {
    Route::controller(AppController::class)->group(function() {
        Route::get('/pulpit', 'dashboard')->name('dashboard');
    });  

    Route::controller(ProfileController::class)->group(function() {
        Route::get('/profil', 'index')->name('profile.index');
        Route::get('/profil/edytuj', 'edit')->name('profile.edit');
        Route::patch('/profil/zapisz', 'update')->name('profile.update');
    });

    Route::controller(BloodController::class)->group(function() {
        Route::get('/badania-krwi', 'index')->name('blood.index');
        Route::patch('/badania-krwi/wyniki', 'update')->name('blood.update');
        Route::post('/badania-krwi/cisnienie', 'pressure')->name('blood.pressure');
    });

    Route::controller(DietController::class)->group(function() {
        Route::get('/diety', 'index')->name('diet.index');
        Route::post('/diety/stworz', 'store')->name('diet.store');
        Route::delete('/diety/usun/{diet}', 'destroy')->name('diet.destroy');
    });

    Route::controller(FileController::class)->group(function() {
        Route::get('/plik/{file:id}', 'show')->name('file.show');
        Route::post('/przeslij-plik', 'store')->name('file.store');
        Route::delete('/usun-plik/{file:id}', 'destroy')->name('file.destroy');
    });
    
});

