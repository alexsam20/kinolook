<?php

use App\Kernel\Router\Route;

return [
    Route::get('/home', function () {
        include_once APP_PATH.'/views/pages/home.php';
    }),
    Route::get('/movies', function () {
        include_once APP_PATH.'/views/pages/movie.php';
    }),
];
