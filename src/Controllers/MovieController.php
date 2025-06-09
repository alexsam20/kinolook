<?php

namespace App\Controllers;

use Kernel\Controller\Controller;
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
        $data = ['name' => 'Alex'];
        $rules = ['name' => ['required', 'min:3', 'max:255']];

        $validator = new Validator();
        dd($validator->validate($data, $rules), $validator->errors());
    }
}
