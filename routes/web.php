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

    Route::prefix('dashboard/admin')->name('dashboard.admin.')->group(function () {
        Route::get('/article', [App\Http\Controllers\Dashboard\Admin\ReviewController::class, 'index'])->name('article.index');
        Route::put('/article/{id}', [App\Http\Controllers\Dashboard\Admin\ReviewController::class, 'update'])->name('article.update');
        
        Route::get('/article/terbit', [App\Http\Controllers\Dashboard\Admin\PublishController::class, 'index'])->name('article.publish.index');
        Route::post('/article/terbit', [App\Http\Controllers\Dashboard\Admin\PublishController::class, 'store'])->name('article.publish');
        Route::delete('/article/terbit/{id}', [App\Http\Controllers\Dashboard\Admin\PublishController::class, 'destroy'])->name('article.unpublish');

        // Route::get('/article/{article_id}', [App\Http\Controllers\Dashboard\Admin\ArticleController::class, 'show'])->name('article.show');
        // Route::put('/article/{id}', [App\Http\Controllers\Dashboard\Admin\ArticleController::class, 'update'])->name('article.update');
    });


});