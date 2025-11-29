<?php

namespace Ilias\Helper;

class Config
{
    private static array $config;

    private static function loadConfig()
    {
        if (!isset(self::$config)) {
            self::$config = Helper::dirFiles(Helper::rootDir() . 'config');

            foreach (self::$config as $file) {
                $key = pathinfo($file, PATHINFO_FILENAME);

                $required = require Helper::rootDir() . 'config/' . $file;

                self::$config[$key] = self::parseConfig($required);
            }
        }
    }

    private static function parseConfig(array $config)
    {
        foreach ($config as $key => $value) {
            if (is_array($value)) {
                $config[$key] = self::parseConfig($value);
            }
        }
        return $config;
    }

    public static function config(string $key, $default = null)
    {
        self::loadConfig();

        $map = explode('.', $key);

        $config = self::$config;

        foreach ($map as $key) {
            $config = $config[$key] ?? $default;
        }

        return $config;
    }
}
