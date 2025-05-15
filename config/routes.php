<?php

use App\Kernel\Router\Route;

return [
    Route::get('/home', static function () {
        include_once APP_PATH.'/views/pages/home.php';
    }),
    Route::get('/movies', static function () {
        include_once APP_PATH.'/views/pages/movie.php';
    }),
];
