<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Blog\PostController;
use App\Http\Controllers\Api\Blog\CategoryController;
Route::apiResource('blog/categories', CategoryController::class);

Route::get('blog/posts', [PostController::class, 'index']);
Route::get('/blog/posts/{id}', [PostController::class, 'show']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


