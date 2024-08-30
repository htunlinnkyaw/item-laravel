<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('item', ItemController::class);
// Route::resource('category', CategoryController::class);

// Route::resource('person', PersonController::class);
// Route::resource('phone', PhoneController::class);
// Route::get('/search', [ItemController::class, 'search'])->name('item.search');

// Route::resource('user', UserController::class);
// Route::resource('post', PostController::class);
// Route::resource('country', CountryController::class);
