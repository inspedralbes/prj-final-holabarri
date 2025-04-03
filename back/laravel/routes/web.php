<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\GoogleController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);