<?php

namespace App\Controllers;

use Kernel\Controller\Controller;

class RegisterController extends Controller
{
    public function index(): void
    {
        $this->view(name: 'register');
    }

    public function register(): void
    {
        $validation = $this->request()->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6', 'confirmed'],
            'password_confirmation' => ['required', 'min:6'],
        ]);

        if (! $validation) {
            foreach ($this->request()->errors() as $field => $errors) {
                $this->session()->set($field, $errors);
            }

            $this->redirect('/register');
        }

        $userId = $this->db()->insert('users', [
            'name' => $this->request()->input('name'),
            'email' => $this->request()->input('email'),
            'password' => password_hash($this->request()->input('password'), PASSWORD_DEFAULT),
        ]);

        $this->redirect('/');
    }
}