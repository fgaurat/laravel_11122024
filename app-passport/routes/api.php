<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/login', [AuthController::class,"login"]);
Route::apiResource('articles', ArticleController::class)->middleware('auth:api');
