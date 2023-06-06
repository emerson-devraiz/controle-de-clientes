<?php

namespace cleanarchitecture\app\http\controllers\painel\home;

use cleanarchitecture\app\core\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
    }

    public function run(string $context): void
    {
        $this->render($context, $context . '/home/home');
    }
}
