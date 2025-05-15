<?php

namespace Kernel\View;

use Kernel\Exception\ViewNotFoundException;

class View
{
    public function page(string $name): void
    {

        $viewPath = APP_PATH."/views/pages/$name.php";

        if (! file_exists($viewPath)) {
            throw new ViewNotFoundException("View $viewPath does not exist");
        }

        extract(['view' => $this]);

        include_once $viewPath;
    }

    public function component(string $name): void
    {
        include_once APP_PATH."/views/components/$name.php";
    }
}
