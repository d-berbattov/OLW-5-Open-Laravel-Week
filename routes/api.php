<?php

use App\Http\Controllers\BrandController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('brands', Brandcontroller::class)
  //Define a logged route
  ->middleware('auth:sanctum');

require __DIR__.'/auth.php';
