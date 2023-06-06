<?php

namespace cleanarchitecture\app\http\controllers\painel\company;

use cleanarchitecture\app\core\Controller;
use cleanarchitecture\domain\company\service\CompanyServiceInterface;
use DI\Attribute\Inject;

class CompanyRenderController extends Controller
{
    #[Inject]
    private CompanyServiceInterface $service;

    public function __construct()
    {
    }

    public function run(string $context): void
    {
        $data['title']  = 'Nova empresa';
        $data['action'] = 'add';

        if (isset(URL_PARAMS[4]) === true || empty(URL_PARAMS[4]) === false) {
            $data['title']  = 'Editar empresa';
            $data['action'] = 'edit';

            $idCompany   = (int) $this->decrypt(URL_PARAMS[4]);
            $dataCompany = json_decode($this->service->search($idCompany), true);

            if ($dataCompany['result'] === 'error') {
                $this->showWarningToast($dataCompany['message'], $context);
                $this->redirect($context . '/company/list');
            }

            $data['id_company'] = URL_PARAMS[4];
            $data['company']    = $dataCompany['company'];
        }

        $this->render($context, $context . '/company/form', $data);
    }
}
