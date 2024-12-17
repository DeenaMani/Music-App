<?php

use App\Http\Controllers\Api\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('category', [Dashboard::class, 'category']);
Route::get('most-played', [Dashboard::class, 'mostPlayed']);
Route::get('category-song/{id}', [Dashboard::class, 'categorySong']);
Route::get('song/{id}', [Dashboard::class, 'song']);
