<?php

namespace App\Controllers;

use Kernel\Controller\Controller;

class MovieController extends Controller
{
    public function index(): void
    {
        $this->view('movie');
    }

    public function addMovie(): void
    {
        $this->view('admin/movies/add');
    }
}
