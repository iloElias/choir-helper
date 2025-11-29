<?php

namespace Ilias\Helper;

class Helper
{
    private static bool $helper_booted = false;

    public static function rootDir()
    {
        return __DIR__ . '/../';
    }

    public static function boot()
    {
        if (self::$helper_booted) {
            return;
        }

        include_once App::rootDir() . 'index.php';

        self::$helper_booted = true;
    }

    public static function dirFiles(
        string $dir,
        bool $recursive = false,
        bool $nested = false,
        int $maxDepth = 8,
        ?string $baseDir = null
    ): array {
        if ($maxDepth <= 0 || !is_dir($dir)) {
            return [];
        }

        if ($baseDir === null) {
            $baseDir = rtrim($dir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
        }

        $dir = rtrim($dir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
        $result = $nested ? [] : [];

        $items = scandir($dir);
        if ($items === false) {
            return [];
        }

        foreach ($items as $item) {
            if ($item === '.' || $item === '..') {
                continue;
            }

            $fullPath = $dir . $item;
            $relativePath = ltrim(str_replace($baseDir, '', $fullPath), DIRECTORY_SEPARATOR);

            if (is_file($fullPath)) {
                $result[] = $nested ? $item : $relativePath;
            } elseif (is_dir($fullPath) && $recursive) {
                if (strpos($item, '.') === 0) {
                    continue;
                }

                $subFiles = self::dirFiles($fullPath, $recursive, $nested, $maxDepth - 1, $baseDir);

                if ($nested) {
                    $result[$item] = $subFiles;
                } else {
                    $result = array_merge($result, $subFiles);
                }
            }
        }

        return $result;
    }

    public static function configDir()
    {
        return self::rootDir() . 'config/';
    }

    public static function resourcesDir()
    {
        return self::rootDir() . 'resources/';
    }

    public static function viewsDir()
    {
        return self::resourcesDir() . 'views/';
    }

    public static function publicDir()
    {
        return self::rootDir() . 'public/';
    }
}
