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

    public function store(): void
    {
        dd($this->request()->file('image'));
        $validation = $this->request()->validate([
            'name' => ['required', 'min:3', 'max:255'],
        ]);

        if (!$validation) {
            foreach ($this->request()->errors() as $field => $errors) {
                $this->session()->set($field, $errors);
            }
            $this->redirect('/admin/movies/add');
        }

        $id = $this->db()->insert('movies', [
            'name' => $this->request()->input('name'),
        ]);

        dd("Movie added successfully with id: " . $id);
    }
}
