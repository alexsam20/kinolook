<?php

namespace App\Controllers;

use App\Services\MovieService;
use Kernel\Controller\Controller;

class HomeController extends Controller
{
    public function index(): void
    {
        $movies = new MovieService($this->db());

        $this->view('home', [
            'movies' => $movies->new(),
        ], 'Main page');
    }
}
