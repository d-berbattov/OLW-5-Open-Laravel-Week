<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('brands', Brandcontroller::class)
  //Define a logged route
  ->middleware('auth:sanctum');

Route::apiResource('categories', CategoryController::class)
  //Define a logged route
  ->middleware('auth:sanctum');

Route::apiResource('products', ProductController::class)
  ->middleware('auth:sanctum');


require __DIR__.'/auth.php';
