<?php

use App\Http\Controllers\Api\ApiTaskController;
use App\Http\Controllers\Api\AuthApiController;

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/auth/login', [AuthApiController::class, 'login']);


Route::get('/tasks', [ApiTaskController::class, 'index']);
Route::post('/task/add', [ApiTaskController::class, 'store']);
