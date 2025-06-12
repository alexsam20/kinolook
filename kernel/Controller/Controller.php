<?php

namespace Kernel\Controller;

use Kernel\Auth\AuthInterface;
use Kernel\Database\DatabaseInterface;
use Kernel\Http\RedirectInterface;
use Kernel\Http\RequestInterface;
use Kernel\Session\SessionInterface;
use Kernel\Storage\StorageInterface;
use Kernel\View\ViewInterface;

abstract class Controller
{
    private ViewInterface $view;

    private RequestInterface $request;

    private RedirectInterface $redirect;

    private SessionInterface $session;

    private DatabaseInterface $database;

    private AuthInterface $auth;

    private StorageInterface $storage;

    public function view(string $name, array $data = []): void
    {
        $this->view->page($name, $data);
    }

    public function setView(ViewInterface $view): void
    {
        $this->view = $view;
    }

    public function request(): RequestInterface
    {
        return $this->request;
    }

    public function setRequest(RequestInterface $request): void
    {
        $this->request = $request;
    }

    public function setRedirect(RedirectInterface $redirect): void
    {
        $this->redirect = $redirect;
    }

    public function redirect(string $url): void
    {
        $this->redirect->to($url);
    }

    public function session(): SessionInterface
    {
        return $this->session;
    }

    public function setSession(SessionInterface $session): void
    {
        $this->session = $session;
    }

    public function db(): DatabaseInterface
    {
        return $this->database;
    }

    public function setDatabase(DatabaseInterface $database): void
    {
        $this->database = $database;
    }

    public function auth(): AuthInterface
    {
        return $this->auth;
    }

    public function setAuth(AuthInterface $auth): void
    {
        $this->auth = $auth;
    }

    public function storage(): StorageInterface
    {
        return $this->storage;
    }

    public function setStorage(StorageInterface $storage): void
    {
        $this->storage = $storage;
    }
}
