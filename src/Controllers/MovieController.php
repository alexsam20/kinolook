<?php

namespace App\Controllers;

use Kernel\Controller\Controller;
use Kernel\Http\Redirect;
use Kernel\Validator\Validator;

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
        $validation = $this->request()->validate([
            'name' => ['required', 'min:3', 'max:255'],
        ]);

        if (!$validation) {
            (new Redirect())->to('/admin/movies/add');
            //dd('Validation Failed', $this->request()->errors());
        }

        dd('validation succeeded');
    }
}
