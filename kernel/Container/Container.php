<?php

namespace Kernel\Container;

use Kernel\Http\Redirect;
use Kernel\Http\Request;
use Kernel\Router\Router;
use Kernel\Validator\Validator;
use Kernel\View\View;

readonly class Container
{
    public Request $request;

    public Router $router;

    public View $view;

    public Validator $validator;

    public Redirect $redirect;

    public function __construct()
    {
        $this->registerServices();
    }

    private function registerServices(): void
    {
        $this->request = Request::createFromGlobals();
        $this->view = new View();
        $this->validator = new Validator();
        $this->request->setValidator($this->validator);
        $this->redirect = new Redirect();
        $this->router = new Router($this->view, $this->request, $this->redirect);
    }
}
