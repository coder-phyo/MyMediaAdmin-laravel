<?php

use App\Http\Controllers\AuthController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('user/login', [AuthController::class, 'login']);
Route::get('category', function () {
    return response()->json([
        'message' => 'Code Lab auth test',
    ]);
})->middleware('auth:sanctum');
