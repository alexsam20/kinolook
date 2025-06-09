<?php

namespace Kernel\View;

use Kernel\Exception\ViewNotFoundException;
use Kernel\Session\SessionInterface;

class View implements ViewInterface
{
    public function __construct(private readonly SessionInterface $session)
    {
        
    }
    
    public function page(string $name): void
    {

        $viewPath = APP_PATH."/views/pages/$name.php";

        if (! file_exists($viewPath)) {
            throw new ViewNotFoundException("View $name does not exist");
        }

        extract($this->defaultData());

        include_once $viewPath;
    }

    public function component(string $name): void
    {
        $componentPath = APP_PATH."/views/components/$name.php";

        if (! file_exists($componentPath)) {
            echo "Component $name does not exist";
            return;
        }

        include_once $componentPath;
    }

    private function defaultData(): array
    {
        return [
            'view' => $this,
            'session' => $this->session,
        ];
    }
}
