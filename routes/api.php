<?php

use Illuminate\Support\Facades\Route;


Route::resources([
    'users'=>\App\Http\Controllers\UserController::class,
]);

Route::resources([
    'posts'=>\App\Http\Controllers\PostController::class,
]);


