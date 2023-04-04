<?php

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\AuthController;
use App\Models\Category;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('user/login', [AuthController::class, 'login']);
Route::post('user/register', [AuthController::class, 'register']);
Route::get('category', function () {
    $category = Category::get();
    return response()->json([
        'message' => 'Code Lab auth test',
        'data' => $category,
    ]);
})->middleware('auth:sanctum');

Route::get('allPostList', [PostController::class, 'getAllPost']);
