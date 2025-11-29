<?php

namespace Ilias\Helper;

class Env
{
    private static array $env;

    public static function env(string $key, $default = null)
    {
        if (!isset(self::$env)) {
            self::$env = parse_ini_file(App::rootDir() . '.env', true, INI_SCANNER_NORMAL);
        }

        return self::$env[$key] ?? $default;
    }
}
