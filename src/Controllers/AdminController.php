<?php

namespace App\Controllers;

use App\Services\CategoryService;
use Kernel\Controller\Controller;

class AdminController extends Controller
{
    public function index(): void
    {
        $categories = new CategoryService($this->db());

        $this->view('admin/index', [
            'categories' => $categories->all(),
        ]);
    }
}