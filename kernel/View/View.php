<?php

namespace Kernel\View;

use Kernel\Auth\AuthInterface;
use Kernel\Exception\ViewNotFoundException;
use Kernel\Session\SessionInterface;

readonly class View implements ViewInterface
{
    public function __construct(
        private SessionInterface $session,
        private AuthInterface $auth
    )
    {
    }

    /**
     * @throws ViewNotFoundException
     */
    public function page(string $name, array $data = []): void
    {

        $viewPath = APP_PATH."/views/pages/$name.php";

        if (! file_exists($viewPath)) {
            throw new ViewNotFoundException("View $name does not exist");
        }

        extract(array_merge($this->defaultData(), $data));

        include_once $viewPath;
    }

    public function component(string $name, array $data = []): void
    {
        $componentPath = APP_PATH."/views/components/$name.php";

        if (! file_exists($componentPath)) {
            echo "Component $name does not exist";
            return;
        }

        extract(array_merge($this->defaultData(), $data));

        include $componentPath;
    }

    private function defaultData(): array
    {
        return [
            'view' => $this,
            'session' => $this->session,
            'auth' => $this->auth,
        ];
    }
}
