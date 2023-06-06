<?php

namespace cleanarchitecture\domain\company\service;

use cleanarchitecture\app\Pagination;
use cleanarchitecture\domain\company\entity\Company;
use cleanarchitecture\domain\company\entity\CompanyFilter;
use cleanarchitecture\domain\company\repository\CompanyRepositoryInterface;

interface CompanyServiceInterface
{
    public function __construct(CompanyRepositoryInterface $repository);

    public function search(int $idCompany);
    public function findAll(Pagination $pagination, CompanyFilter $filter): string;
    public function toAdd(Company $company);
    public function toEdit(Company $company);
    public function toRemove(int $idCompany);
}