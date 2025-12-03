<?php

use App\Http\Controllers\Api\ArticleApiController;
use App\Http\Controllers\Api\EventApiController;
use App\Http\Controllers\Api\GerejaApiController;
use App\Http\Controllers\Api\SusunanApiPanitiaController;
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

// Api Event
Route::get('/event', [EventApiController::class, 'index']);
Route::get('/event/{slug}', [EventApiController::class, 'show']);
// Api Event End

// Api Pengurus
Route::get('/panitia', [SusunanApiPanitiaController::class, 'index']);
// Api Pengurus End
