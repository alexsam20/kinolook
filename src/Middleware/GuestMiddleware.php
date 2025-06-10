<?php

namespace App\Middleware;

use Kernel\Middleware\AbstractMiddleware;

class GuestMiddleware extends AbstractMiddleware
{

    public function handle(): void
    {

        if ($this->auth->check()) {
            $this->redirect->to('/home');
        }
    }
}