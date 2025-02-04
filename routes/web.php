<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\AppController;
use App\Http\Controllers\DietController;
use App\Http\Controllers\BloodController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified', ])->group(function () {
    Route::controller(AppController::class)->group(function() {
        Route::get('/pulpit', 'dashboard')->name('dashboard');
    });  

    Route::controller(ProfileController::class)->group(function() {
        Route::get('/profile', 'index')->name('profile.index');
    });

    Route::controller(BloodController::class)->group(function() {
        Route::get('/badania-krwi', 'index')->name('blood.index');
    });

    Route::controller(DietController::class)->group(function() {
        Route::get('/diety', 'index')->name('diet.index');
    });
    
});