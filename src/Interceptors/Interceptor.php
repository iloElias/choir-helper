<?php

namespace Ilias\Helper\Interceptors;

use Ilias\Helper\Helper;

class Interceptor
{
    private static bool $booted = false;

    public static function boot()
    {
        if (self::$booted) {
            return;
        }

        include_once Helper::rootDir() . 'index.php';

        self::$booted = true;
    }

    public static function __callStatic($name, $arguments)
    {
        self::boot();

        return static::__callStatic($name, $arguments);
    }
}
