<?php

namespace Ilias\Helper\Interceptors;

use Ilias\Helper\Helper;

class Interceptor
{
    private static bool $interceptor_booted = false;

    public static function boot()
    {
        if (self::$interceptor_booted) {
            return;
        }

        include_once Helper::rootDir() . 'index.php';

        self::$interceptor_booted = true;
    }
}
