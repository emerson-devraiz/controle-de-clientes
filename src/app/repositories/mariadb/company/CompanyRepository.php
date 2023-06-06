<?php

namespace cleanarchitecture\app\repositories\mariadb\company;

use cleanarchitecture\app\repositories\DatabaseInterface;
use cleanarchitecture\domain\company\entity\Company;
use cleanarchitecture\domain\company\repository\CompanyRepositoryInterface;

class CompanyRepository implements CompanyRepositoryInterface
{
    private \mysqli $conn;
    private DatabaseInterface $db;

    public function __construct(DatabaseInterface $database)
    {
        $this->db   = $database;
        $this->conn = $database->getInstance();
    }

    public function findId(int $idCompany): mixed
    {
        $sql   = "SELECT id_company,
                         name,
                         cnpj,
                         email
                  FROM company
                  WHERE (id_company = '" . $idCompany . "')";
        $query = $this->conn->query($sql);
        $this->db->throwException($query, 'CompanyRepository -> findId');

        return $query;
    }

    public function getTotalRecords($filter): mixed
    {
        $sql   = "SELECT COUNT(*) as total
                  FROM company
                  " . $filter->getFilterName() . "";
        $query = $this->conn->query($sql);
        $this->db->throwException($query, 'CompanyRepository -> getTotalRecords');

        return $query;
    }

    public function fetchAll($pagination, $filter): mixed
    {
        $sql   = "SELECT id_company,
                         name,
                         cnpj
                  FROM company
                  " . $filter->getFilterName() . "
                  ORDER BY id_company DESC
                  LIMIT " . $pagination->getStart() . ', ' . $pagination->getEnd();
        $query = $this->conn->query($sql);
        $this->db->throwException($query, 'CompanyRepository -> fetchAll');

        return $query;
    }

    public function insert(Company $company): bool
    {
        $sql = "INSERT INTO company (cnpj,
                                     name,
                                     email)
                                     VALUES
                                    ('" . $company->getCnpj() . "',
                                     '" . $company->getName() . "',
                                     '" . $company->getEmail() . "')";
        $query = $this->conn->query($sql);
        $this->db->throwException($query, 'CompanyRepository -> insert');

        return $query;
    }

    public function update(Company $company): bool
    {
        $sql = "UPDATE company
                SET cnpj  = '" . $company->getCnpj() . "',
                    name  = '" . $company->getName() . "',
                    email = '" . $company->getEmail() . "'
                WHERE (id_company = '" . $company->getId() . "')";
        $query = $this->conn->query($sql);
        $this->db->throwException($query, 'CompanyRepository -> update');

        return $query;
    }

    public function delete(int $idCompany): bool
    {
        $sql = "DELETE
                FROM company
                WHERE (id_company = '" . $idCompany . "')";
        $query = $this->conn->query($sql);
        $this->db->throwException($query, 'CompanyRepository -> delete');

        return $query;
    }
}
