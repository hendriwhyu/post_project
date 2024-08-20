<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;


Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'authenticate']);
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerUser']);

Route::prefix('/admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/posts', [DashboardController::class, 'index'])->name('posts');

    Route::get('/account', [AccountController::class, 'index'])->name('account');
    Route::post('/account', [AccountController::class, 'store'])->name('account.store');
    Route::get('/admin/account/{username}/edit', [AccountController::class, 'edit'])->name('account.edit');
    Route::put('/admin/account/{username}', [AccountController::class, 'update'])->name('account.update');
    Route::delete('/account/{id}', [AccountController::class, 'destroy'])->name('account.destroy');

    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
    Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
});

Route::prefix('/author')->name('author.')->middleware(['auth', 'role:author'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/posts', [PostController::class, 'index'])->name('posts');

    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
    Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
});
