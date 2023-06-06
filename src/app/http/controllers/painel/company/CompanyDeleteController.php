<?php

namespace cleanarchitecture\app\http\controllers\painel\company;

use cleanarchitecture\app\core\Controller;
use cleanarchitecture\domain\company\service\CompanyServiceInterface;
use DI\Attribute\Inject;

class CompanyDeleteController extends Controller
{
    #[Inject]
    private CompanyServiceInterface $service;

    public function __construct()
    {
    }

    public function run(string $context): void
    {
        if (isset(URL_PARAMS[4]) === true || empty(URL_PARAMS[4]) === false) {
            $idCompany = (int) $this->decrypt(URL_PARAMS[4]);
            $data      = json_decode($this->service->toRemove($idCompany), true);

            if ($data['result'] === 'error') {
                $this->showWarningToast($data['message'], $context);
                $this->redirect($context . '/company/list');
            }

            $this->showSuccessToast($data['message'], $context);
            $this->redirect($context . '/company/list');
        }
    }
}
