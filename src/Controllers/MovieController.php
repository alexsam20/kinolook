<?php

namespace App\Controllers;

use Kernel\Controller\Controller;

class MovieController extends Controller
{
    public function index(): void
    {
        $this->view('movie');
    }

    public function add(): void
    {
        $this->view('admin/movies/add');
    }

    public function store()
    {
        dd($this->request());
        dd(__CLASS__ . '::' . __FUNCTION__);
    }
}
