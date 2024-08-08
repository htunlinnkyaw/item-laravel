<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\PhoneController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('item', ItemController::class);
Route::resource('category', CategoryController::class);

Route::resource('person', PersonController::class);
Route::resource('phone', PhoneController::class);
