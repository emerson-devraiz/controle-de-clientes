<?php

namespace cleanarchitecture\app\http\controllers\painel\company;

use cleanarchitecture\app\core\Controller;
use cleanarchitecture\app\Pagination;
use cleanarchitecture\domain\company\entity\CompanyFilter;
use cleanarchitecture\domain\company\service\CompanyServiceInterface;
use DI\Attribute\Inject;

class CompanyListController extends Controller
{
    #[Inject]
    private Pagination $pagination;

    #[Inject]
    private CompanyFilter $filter;

    #[Inject]
    private CompanyServiceInterface $service;

    public function __construct()
    {
    }

    public function run(string $context): void
    {
        if (isset($_COOKIE['ck-records-company-list'])) {
            $this->pagination->setNumberOfRecordsPerPage(intval($_COOKIE['ck-records-company-list']));
        }

        if (isset($_COOKIE['ck-page-company-list'])) {
            $this->pagination->setCurrentPage(intval($_COOKIE['ck-page-company-list']));
        }

        if (isset($_GET['filter'])) {
            $name = $this->filterChars($_GET['name']);
            $this->filter->setName($name);
        } else if (isset($_COOKIE['ck-company-list-name-filter'])) {
            $name = $this->filterChars($_COOKIE['ck-company-list-name-filter']);
            $this->filter->setName($name);
        }

        $data = json_decode($this->service->findAll($this->pagination, $this->filter), true);

        if ($data['result'] === 'error') {
            $this->showWarningToast($data['message'], $context);
            $this->redirect('painel/company/list');
            exit;
        }

        $this->render($context, $context . '/company/list', $data);
    }
}
