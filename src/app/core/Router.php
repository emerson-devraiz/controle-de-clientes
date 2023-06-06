<?php

namespace cleanarchitecture\app\core;

class Router
{
    private string $context;
    private string $route;
    private string $action;

    public function __construct() {
        $url = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        $url = filter_var($url, FILTER_SANITIZE_URL);

        $arrayRoutes  = explode('/', $url);
        $this->context = (isset($arrayRoutes[1]) === false || $arrayRoutes[1] === '') ? 'web' : $arrayRoutes[1];
        $this->route   = (isset($arrayRoutes[2]) === false || $arrayRoutes[2] === '') ? 'home' : $arrayRoutes[2];
        $this->action  = (isset($arrayRoutes[3]) === true) ? $arrayRoutes[3] : $this->route;

        define('URL_PARAMS', $arrayRoutes);
    }

    public function getContext(): string
    {
        return $this->context;
    }

    public function getRoute(): string
    {
        return $this->route;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function isLogin(): bool
    {
        return ($this->route === 'login');
    }
}