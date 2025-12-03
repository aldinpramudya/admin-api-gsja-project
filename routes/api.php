<?php

use App\Http\Controllers\Api\ArticleApiController;
use App\Http\Controllers\Api\GerejaApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Api Article
Route::get('/articles', [ArticleApiController::class, 'index']);
Route::get('/articles/{slug}', [ArticleApiController::class, 'show']);
// Api Article End

// Api Gereja
Route::get('/gereja', [GerejaApiController::class, 'index']);
Route::get('/gereja/{slug}', [GerejaApiController::class, 'show']);
// Api Gereja End


