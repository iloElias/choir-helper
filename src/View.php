<?php

namespace Ilias\Helper;

use Ilias\Helper\Interceptors\Interceptor;

class View extends Interceptor
{
    public static function view(string $view, array $data = [])
    {
        if (!is_dir(Helper::resourcesDir())) {
            throw new \Exception('Resources directory not found: ' . Helper::resourcesDir());
        }

        $viewDir = Helper::viewsDir();
        if (!is_dir($viewDir)) {
            throw new \Exception("View directory not found: {$viewDir}");
        }

        $viewPath = self::viewPath($viewDir, $view);
        $viewFile = self::viewFile($viewDir, $view);

        $candidates = Helper::dirFiles($viewPath, false, true);
        if (empty($candidates)) {
            throw new \Exception("View directory is empty: {$viewPath}");
        }

        $found = self::resolve($candidates, $viewFile);
        if (empty($found)) {
            throw new \Exception("View not found: {$viewFile} (tried {$viewPath})");
        }
        $metches = count($found);
        if ($metches > 1) {
            throw new \Exception("Multiple views found: {$viewFile} (tried {$viewPath})");
        }

        return self::render($viewPath . DIRECTORY_SEPARATOR . array_first($found), $data);
    }

    private static function viewPath(string $viewDir, string $view)
    {
        $viewParts = explode('.', $view);
        array_pop($viewParts);

        $dirPath = $viewDir . ($viewParts ? implode(DIRECTORY_SEPARATOR, $viewParts) . DIRECTORY_SEPARATOR : '');
        return $dirPath;
    }

    private static function viewFile(string $viewDir, string $view)
    {
        $viewParts = explode('.', $view);
        return array_pop($viewParts);
    }

    private static function resolve(array $candidates, string $view)
    {
        foreach ($candidates as $file) {
            if (!str_starts_with($file, $view)) {
                array_shift($file);
            }
        }

        return $candidates;
    }

    private static function render(string $view, array $data = [])
    {
        ob_start();
        extract($data);
        include $view;
        return ob_get_clean();
    }

}
