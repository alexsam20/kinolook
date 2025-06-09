<?php

namespace Kernel\Http;

class Redirect
{
    public function to(string $url)
    {
        header("Location: $url");
        exit;
    }
}