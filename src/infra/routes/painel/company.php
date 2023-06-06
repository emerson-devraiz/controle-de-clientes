<?php

use cleanarchitecture\app\http\controllers\painel\company\CompanyAddController;
use cleanarchitecture\app\http\controllers\painel\company\CompanyDeleteController;
use cleanarchitecture\app\http\controllers\painel\company\CompanyEditController;
use cleanarchitecture\app\http\controllers\painel\company\CompanyListController;
use cleanarchitecture\app\http\controllers\painel\company\CompanyRenderController;

return [
    'GET|list'   => CompanyListController::class,
    'GET|render' => CompanyRenderController::class,
    'POST|add'   => CompanyAddController::class,
    'POST|edit'  => CompanyEditController::class,
    'GET|delete' => CompanyDeleteController::class
];
