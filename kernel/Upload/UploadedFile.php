<?php

namespace Kernel\Upload;

use RuntimeException;

readonly class UploadedFile implements UploadedFileInterface
{
    public function __construct(
        public string $name,
        public string $type,
        public string $tmpName,
        public int    $error,
        public int    $size,
    ) {
    }

    public function move(string $path, string $fileName = null): string|false
    {
        $storagePath = APP_PATH . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . $path;

        if (
               !is_dir($storagePath)
            && !mkdir($storagePath, 0777, true)
            && !is_dir($storagePath)
        ) {
            throw new RuntimeException(sprintf('Directory "%s" was not created', $storagePath));
        }

        $fileName = $fileName ?? basename($this->randomFileName());
        $filePath = $storagePath . DIRECTORY_SEPARATOR . $fileName;

        if (move_uploaded_file($this->tmpName, $filePath)) {
            return $path . DIRECTORY_SEPARATOR . $fileName;
        }

        return false;
    }

    private function randomFileName(): string
    {
        return md5(uniqid(mt_rand(), true)).".{$this->getExtension()}";
    }

    public function getExtension(): string
    {
        return pathinfo($this->name, PATHINFO_EXTENSION);
    }
}