<?php

namespace App\Controllers;

use Kernel\Controller\Controller;

class RegisterController extends Controller
{
    public function index(): void
    {
        $this->view(name: 'register');
    }
}