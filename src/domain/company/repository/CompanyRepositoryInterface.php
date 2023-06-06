<?php

namespace cleanarchitecture\domain\company\repository;

use cleanarchitecture\app\Pagination;
use cleanarchitecture\app\repositories\mariadb\DB;
use cleanarchitecture\domain\company\entity\Company;
use cleanarchitecture\domain\company\entity\CompanyFilter;

interface CompanyRepositoryInterface
{
    public function __construct(DB $database);

    public function findId(int $idCompany): mixed;
    public function getTotalRecords(CompanyFilter $filter): mixed;
    public function fetchAll(Pagination $pagination, CompanyFilter $filter): mixed;
    public function insert(Company $company): bool;
    public function update(Company $company): bool;
    public function delete(int $idCompany): bool;
}