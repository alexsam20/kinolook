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
            foreach ($this->request()->errors() as $field => $errors) {
                $this->session()->set($field, $errors);
            }
            $this->redirect('/admin/movies/add');
        }

        dd('validation succeeded');
    }
}
