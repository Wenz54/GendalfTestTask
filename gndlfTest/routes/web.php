<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

// Маршруты для административного интерфейса
Route::middleware('auth')->group(function () {
    Route::resource('items', ItemController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('users', UserController::class);
});

// Маршруты для аутентификации
require __DIR__.'/auth.php';

// Главная страница
Route::get('/', function () {
    return view('welcome');
});

// Страница панели управления
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Маршрут для редактирования профиля
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');