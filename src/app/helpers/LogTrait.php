<?php

namespace cleanarchitecture\app\helpers;

trait LogTrait
{
    private function generate(string $content, string $path, string $file)
    {
        if (file_exists($path) === false) {
            mkdir($path, 0755, true);
        }

        $file = fopen($path . $file, 'a+');
        fwrite($file, $content . "\n");
        fclose($file);
    }
}
