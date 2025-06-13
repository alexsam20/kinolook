<?php

namespace Kernel\Container;

use Kernel\Auth\Auth;
use Kernel\Auth\AuthInterface;
use Kernel\Config\Config;
use Kernel\Config\ConfigInterface;
use Kernel\Database\Database;
use Kernel\Database\DatabaseInterface;
use Kernel\Http\Redirect;
use Kernel\Http\RedirectInterface;
use Kernel\Http\Request;
use Kernel\Http\RequestInterface;
use Kernel\Router\Router;
use Kernel\Router\RouterInterface;
use Kernel\Session\Session;
use Kernel\Session\SessionInterface;
use Kernel\Storage\Storage;
use Kernel\Storage\StorageInterface;
use Kernel\Validator\Validator;
use Kernel\Validator\ValidatorInterface;
use Kernel\View\View;

readonly class Container
{
    public RequestInterface $request;

    public RouterInterface $router;

    public View $view;

    public ValidatorInterface $validator;

    public RedirectInterface $redirect;

    public SessionInterface $session;

    public ConfigInterface $config;

    public DatabaseInterface $database;

    public AuthInterface $auth;

    public StorageInterface $storage;

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
        $this->config = new Config();
        $this->database = new Database($this->config);
        $this->auth = new Auth($this->database, $this->session, $this->config);
        $this->storage = new Storage($this->config);
        $this->view = new View($this->session, $this->auth, $this->storage);
        $this->router = new Router(
            $this->view,
            $this->request,
            $this->redirect,
            $this->session,
            $this->database,
            $this->auth,
            $this->storage,
        );
    }
}
