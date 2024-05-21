<?php

use App\Http\Controllers\Dashboard\User\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingWelcomeController;

Route::get('/', [LandingWelcomeController::class, 'index'])->name('index');

Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register.post');

Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.post');
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    // Route::get('dashboard', [App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard.index');

    Route::prefix('dashboard/user')->name('dashboard.user.')->group(function () {
        Route::get('/article', [ArticleController::class, 'index'])->name('article.index');
        Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
        Route::post('/article', [ArticleController::class, 'store'])->name('article.store');
        Route::get('/article/{article_id}', [ArticleController::class, 'show'])->name('article.show');
        Route::get('/article/{id}/edit', [ArticleController::class, 'edit'])->name('article.edit');
        Route::put('/article/{id}', [ArticleController::class, 'update'])->name('article.update');
        Route::delete('/article/{id}', [ArticleController::class, 'destroy'])->name('article.destroy');
    });
    // Route::get('dashboard/user/article', [ArticleController::class, 'index'])->name('dashboard.user.article.index');
    // Route::get('dashboard/user/article/create', [App\Http\Controllers\Dashboard\User\ArticleController::class, 'create'])->name('dashboard.user.article.create');
    // Route::post('dashboard/user/article', [App\Http\Controllers\Dashboard\User\ArticleController::class, 'store'])->name('dashboard.user.article.store');
    // Route::get('dashboard/user/article/{id}', [App\Http\Controllers\Dashboard\User\ArticleController::class, 'show'])->name('dashboard.user.article.show');
    // Route::get('dashboard/user/article/{id}/edit', [App\Http\Controllers\Dashboard\User\ArticleController::class, 'edit'])->name('dashboard.user.article.edit');
    // Route::put('dashboard/user/article/{id}', [App\Http\Controllers\Dashboard\User\ArticleController::class, 'update'])->name('dashboard.user.article.update');
    // Route::delete('dashboard/user/article/{id}', [App\Http\Controllers\Dashboard\User\ArticleController::class, 'destroy'])->name('dashboard.user.article.destroy');
});