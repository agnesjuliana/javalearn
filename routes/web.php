<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingWelcomeController;

Route::get('/', [LandingWelcomeController::class, 'index'])->name('index');

Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register.post');

Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.post');
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');