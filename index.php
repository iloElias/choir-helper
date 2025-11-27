<?php

require_once __DIR__ . '/vendor/autoload.php';

/**
 * Helper functions
 */

if (!function_exists('array_first')) {
    function array_first(array $array)
    {
        return $array[0];
    }
}

if (!function_exists('array_last')) {
    function array_last(array $array)
    {
        return $array[count($array) - 1];
    }
}

if (!function_exists('env')) {
    function env(string $key, $default = null)
    {
        return Ilias\Helper\Env::env($key, $default);
    }
}

if (!function_exists('config')) {
    function config(string $key, $default = null)
    {
        return Ilias\Helper\Config::config($key, $default);
    }
}

if (!function_exists('root_dir')) {
    function root_dir()
    {
        return Ilias\Helper\Helper::rootDir();
    }
}

if (!function_exists('dir_files')) {
    function dir_files(string $dir)
    {
        return Ilias\Helper\Helper::dirFiles($dir);
    }
}
