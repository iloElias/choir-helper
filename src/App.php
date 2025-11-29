<?php

namespace Ilias\Helper;

class App
{
    private static string $root_dir = __DIR__ . '/../';

    public static function configure(string $root_dir)
    {
        self::$root_dir = realpath($root_dir) . DIRECTORY_SEPARATOR;

        Helper::boot();
    }

    public static function rootDir()
    {
        return self::$root_dir;
    }
}