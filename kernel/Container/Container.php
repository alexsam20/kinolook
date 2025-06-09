<?php

namespace Kernel\Container;

use Kernel\Http\Redirect;
use Kernel\Http\Request;
use Kernel\Router\Router;
use Kernel\Session\Session;
use Kernel\Validator\Validator;
use Kernel\View\View;

readonly class Container
{
    public Request $request;

    public Router $router;

    public View $view;

    public Validator $validator;

    public Redirect $redirect;

    public Session $session;

    public function __construct()
    {
        $this->registerServices();
    }

    private function registerServices(): void
    {
        $this->request = Request::createFromGlobals();
        $this->validator = new Validator();
        $this->request->setValidator($this->validator);
        $this->redirect = new Redirect();
        $this->session = new Session();
        $this->view = new View($this->session);
        $this->router = new Router($this->view, $this->request, $this->redirect, $this->session);
    }
}
