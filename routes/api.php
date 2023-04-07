<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\AuthController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('user/login', [AuthController::class, 'login']);
Route::post('user/register', [AuthController::class, 'register']);

// post
Route::get('allPostList', [PostController::class, 'getAllPost']);
Route::post('post/search', [PostController::class, 'postSearch']);

// category
Route::get('allCategory', [CategoryController::class, 'getAllCategory']);
Route::post('category/search', [CategoryController::class, 'categorySearch']);
