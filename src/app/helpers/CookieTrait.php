<?php

namespace cleanarchitecture\app\helpers;

trait CookieTrait
{
    public function cookieDefine(array $params): void
    {
        $expires = (isset($params['expires']) === true) ? $params['expires'] : 0;
        $path    = (isset($params['path'])    === true) ? $params['path']    : '/';

        setcookie($params['name'], $params['value'], $expires, $path);
    }

    public function cookieDestroy(string $name, string $path = '/'): void
    {
        if (isset($_COOKIE[$name]) === true) {
            unset($_COOKIE[$name]);
            setcookie($name, '', -1, $path);
        }
    }
}
