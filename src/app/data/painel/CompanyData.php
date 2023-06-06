<?php

namespace cleanarchitecture\app\data\painel;

use cleanarchitecture\app\core\Data;
use cleanarchitecture\domain\company\entity\Company;
use cleanarchitecture\domain\company\entity\CompanyDataInterface;
use DI\Attribute\Inject;

class CompanyData extends Data implements CompanyDataInterface
{
    #[Inject]
    private Company $company;

    public function __construct() {
    }

    public function getCompany(array $params): Company
    {
        if (isset($params['save']) === true) {
            $idCompany = (int) ($params['id_company'] !== '0') ? $this->decrypt($params['id_company']) : 0;
            $cnpj      = $this->filterCnpj($params['cnpj']);
            $name      = $this->filterChars($params['name']);
            $email     = $this->filterEmail($params['email']);
            
            $this->company->setId($idCompany);
            $this->company->setCnpj($cnpj);
            $this->company->setName($name);
            $this->company->setEmail($email);
            
           return $this->company;
        }
    }
}
