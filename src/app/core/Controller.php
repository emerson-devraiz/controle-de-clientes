<?php

namespace cleanarchitecture\app\core;

use cleanarchitecture\app\helpers\CookieTrait;
use cleanarchitecture\app\helpers\FilterTrait;
use cleanarchitecture\app\helpers\MaskTrait;
use cleanarchitecture\app\helpers\SecurityTrait;

abstract class Controller
{
    use SecurityTrait;
    use MaskTrait;
    use FilterTrait;
    use CookieTrait;

    abstract protected function run(string $context): void;

    public function render(string $context, string $view, array $data = []): void
    {
        if (isset($_COOKIE['alert-warning'])) {
            $data['alert']         = true;
            $data['alert-title']   = 'Aviso!';
            $data['alert-type']    = 'warning';
            $data['alert-message'] = $_COOKIE['alert-warning'];
            $this->cookieDestroy('alert-warning', '/' . $context);
        }

        if (isset($_COOKIE['alert-success'])) {
            $data['alert']         = true;
            $data['alert-title']   = 'Sucesso!';
            $data['alert-type']    = 'success';
            $data['alert-message'] = $_COOKIE['alert-success'];
            $this->cookieDestroy('alert-success', '/' . $context);
        }

        require '../src/infra/views/' . $context . '/template.php';
    }

    public function redirect(string $view): void
    {
        header('Location: /' . $view);
        exit;
    }

    public function showWarningToast(string $message, string $context)
    {
        $this->cookieDefine([
            'name'  => 'alert-warning',
            'value' => $message,
            'path'  => '/' . $context
        ]);
    }

    public function showSuccessToast(string $message, string $context)
    {
        $this->cookieDefine([
            'name'  => 'alert-success',
            'value' => $message,
            'path'  => '/' . $context
        ]);
    }
}
