<?php

namespace Kernel\Http;

use JetBrains\PhpStorm\NoReturn;

class Redirect implements RedirectInterface
{
    #[NoReturn]
    public function to(string $url): void
    {
        header("Location: $url");
        exit;
    }
}