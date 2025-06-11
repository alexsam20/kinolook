<?php

namespace Kernel\Storage;

use Kernel\Storage\StorageInterface;

class Storage implements StorageInterface
{

    public function url(string $path): string
    {
        return 'http://127.0.0.1:8000/storage/' . $path;
    }

    public function get(string $path): string
    {
        return file_get_contents($this->storagePath($path));
    }

    private function storagePath(string $path): string
    {
        return APP_PATH."/storage/$path";
    }
}