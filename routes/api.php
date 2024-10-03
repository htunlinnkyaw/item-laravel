<?php

use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\ItemApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("/item", function () {
    return Response()->json("Hello World");
});

// Route::get('/category', [CategoryapiController::class, 'index']);
// Route::post('/category', [CategoryApiController::class, 'store']);
// Route::put('/category/{id}', [CategoryApiController::class, 'update']);
// Route::delete('/category/{id}', [CategoryApiController::class, 'destroy']);

Route::get('category/search', [CategoryApiController::class, 'search']);
Route::apiResource('category', CategoryApiController::class);

Route::get('item/search', [ItemApiController::class, 'search']);
Route::apiResource('item', ItemApiController::class);
