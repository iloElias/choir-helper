<?php

namespace Ilias\Helper;

class App
{
    private static string $root_dir;

    public static function configure(string $root_dir)
    {
        self::$root_dir = realpath(rtrim($root_dir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR);

        Helper::boot();
    }

    public static function rootDir()
    {
        return self::$root_dir;
    }
}