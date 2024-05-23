<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;


Route::resources([
    'users'=>\App\Http\Controllers\UserController::class,
]);

Route::resources([
    'posts'=>\App\Http\Controllers\PostController::class,
]);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/create', [PostController::class, 'create']);


