<?php

use App\Controllers\HomeController;
use App\Controllers\MovieController;
use Kernel\Router\Route;

return [
    Route::get('/home', [HomeController::class, 'index']),
    Route::get('/movies', [MovieController::class, 'index']),
    Route::get('/admin/movies/add', [MovieController::class, 'addMovie']),
];
