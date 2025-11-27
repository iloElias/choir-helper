<?php

namespace Ilias\Helper;

use Ilias\Helper\Interceptors\Interceptor;

class Helper extends Interceptor
{
    public static function rootDir()
    {
        return __DIR__ . '/../';
    }

    public static function dirFiles(string $dir)
    {
        $files = scandir($dir);

        if ($files === false) {
            return [];
        }

        return array_filter($files, function ($file) {
            return !in_array($file, ['.', '..']);
        }) ?? [];
    }
}
