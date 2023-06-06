<?php

namespace cleanarchitecture\domain\company\entity;

interface CompanyDataInterface
{
    public function getCompany(array $params): Company;
}