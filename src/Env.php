<?php

namespace Ilias\Helper;

use Ilias\Helper\Interceptors\Interceptor;

class Env extends Interceptor
{
    private static array $env;

    public static function env(string $key, $default = null)
    {
        if (!isset(self::$env)) {
            self::$env = parse_ini_file(Helper::rootDir() . '.env', true, INI_SCANNER_NORMAL);
        }

        return self::$env[$key] ?? $default;
    }
}
