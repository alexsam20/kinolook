<?php

namespace Kernel\Storage;

use Kernel\Config\ConfigInterface;

readonly class Storage implements StorageInterface
{
    public function __construct(
        private ConfigInterface $config,
    ) {
    }

    public function url(string $path): string
    {
        $url = $this->config->get('app.url', 'http://127.0.0.1:8000');

        return $url . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR .  $path;
    }

    public function get(string $path): string
    {
        return file_get_contents($this->storagePath($path));
    }

    private function storagePath(string $path): string
    {
        return APP_PATH. DIRECTORY_SEPARATOR . 'storage' .  DIRECTORY_SEPARATOR . $path;
    }
}