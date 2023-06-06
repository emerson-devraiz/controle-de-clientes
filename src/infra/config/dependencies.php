<?php

use cleanarchitecture\app\data\painel\CompanyData;
use cleanarchitecture\app\repositories\DatabaseInterface;
use cleanarchitecture\app\repositories\mariadb\company\CompanyRepository;
use cleanarchitecture\app\repositories\mariadb\DB;
use cleanarchitecture\domain\company\entity\CompanyDataInterface;
use cleanarchitecture\domain\company\repository\CompanyRepositoryInterface;
use cleanarchitecture\domain\company\service\CompanyService;
use cleanarchitecture\domain\company\service\CompanyServiceInterface;

return [
    DatabaseInterface::class          => DI\autowire(DB::class),
    CompanyServiceInterface::class    => DI\autowire(CompanyService::class),
    CompanyRepositoryInterface::class => DI\autowire(CompanyRepository::class),
    CompanyDataInterface::class       => DI\autowire(CompanyData::class)
];