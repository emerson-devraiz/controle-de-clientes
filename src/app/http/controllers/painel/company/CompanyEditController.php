<?php

namespace cleanarchitecture\app\http\controllers\painel\company;

use cleanarchitecture\app\core\Controller;
use cleanarchitecture\domain\company\entity\CompanyDataInterface;
use cleanarchitecture\domain\company\service\CompanyServiceInterface;
use DI\Attribute\Inject;

class CompanyEditController extends Controller
{
    #[Inject]
    private CompanyDataInterface $data;

    #[Inject]
    private CompanyServiceInterface $service;

    public function __construct()
    {
    }

    public function run(string $context): void
    {
        if (isset($_POST) === true) {
            $company = $this->data->getCompany($_POST);
            $data    = json_decode($this->service->toEdit($company), true);
            
            if ($data['result'] === 'error') {
                $this->showWarningToast($data['message'], $context);
            }
            
            $this->redirect($context . '/company/list');
        }
    }
}
