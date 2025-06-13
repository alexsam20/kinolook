<?php

namespace App\Controllers;

use App\Services\CategoryService;
use App\Services\MovieService;
use Kernel\Controller\Controller;

class MovieController extends Controller
{
    private MovieService $service;

    public function create(): void
    {
        $categories = new CategoryService($this->db());

        $this->view('admin/movies/add', [
            'categories' => $categories->all(),
        ]);
    }

    public function add(): void
    {
        $this->view('admin/movies/add');
    }

    public function store(): void
    {
        $validation = $this->request()->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'description' => ['required'],
            'category' => ['required'],
        ]);

        if (!$validation) {
            foreach ($this->request()->errors() as $field => $errors) {
                $this->session()->set($field, $errors);
            }
            $this->redirect('/admin/movies/add');
        }

        $this->service()->store(
            $this->request()->input('name'),
            $this->request()->input('description'),
            $this->request()->file('image'),
            $this->request()->input('category'),
        );

        $this->redirect('/admin');
    }

    private function service(): MovieService
    {
        if (!isset($this->service)) {
            $this->service = new MovieService($this->db());
        }

        return $this->service;
    }
}
