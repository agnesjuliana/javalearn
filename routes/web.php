<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingWelcomeController;

Route::get('/', [LandingWelcomeController::class, 'index'])->name('index');