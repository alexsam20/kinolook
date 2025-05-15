<?php

namespace App\Kernel\Controllers;

class MovieController
{
    public function index(): void
    {
        include_once APP_PATH.'/views/pages/movie.php';
    }
}
