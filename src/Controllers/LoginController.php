<?php

namespace App\Controllers;

use Kernel\Controller\Controller;

class LoginController extends Controller
{
    public function index(): void
    {
        $this->view(name: 'login');
    }

    public function login(): void
    {
        $email = $this->request()->input('email');
        $password = $this->request()->input('password');
        dd($this->auth()->attempt($email, $password), $_SESSION);

        /*if ($this->auth()->attempt($email, $password)) {
            $this->redirect('/');
        }

        $this->session()->set('error', 'Неверный логин или пароль');

        $this->redirect('/login');*/
    }

    /*public function logout(): void
    {
        $this->auth()->logout();

        $this->redirect('/login');
    }*/
}