<?php

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\MovieController;
use App\Controllers\RegisterController;
use App\Middleware\GuestMiddleware;
use Kernel\Router\Route;
use App\Middleware\AuthMiddleware;

return [
    Route::get('/', [HomeController::class, 'index']),
    Route::get('/register', [RegisterController::class, 'index'], [GuestMiddleware::class]),
    Route::post('/register', [RegisterController::class, 'register']),
    Route::get('/login', [LoginController::class, 'index'], [GuestMiddleware::class]),
    Route::post('/login', [LoginController::class, 'login']),
    Route::post('/logout', [LoginController::class, 'logout']),
    Route::get('/movies', [MovieController::class, 'index']),
    Route::get('/admin/movies/add', [MovieController::class, 'add'], [AuthMiddleware::class]),
    Route::post('/admin/movies/add', [MovieController::class, 'store']),
];
