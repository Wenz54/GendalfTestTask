<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

Route::middleware('api')->group(function () {
    Route::get('items', [ItemController::class, 'apiIndex']);
    Route::get('items/{id}', [ItemController::class, 'apiShow']);
    Route::get('categories', [CategoryController::class, 'apiIndex']);
    Route::get('categories/{id}', [CategoryController::class, 'apiShow']);
    Route::get('users', [UserController::class, 'apiIndex']);
    Route::get('users/{id}', [UserController::class, 'apiShow']);
});