<?php

namespace cleanarchitecture\domain\company\service;

use cleanarchitecture\app\Pagination;
use cleanarchitecture\domain\company\entity\Company;
use cleanarchitecture\domain\company\entity\CompanyFilter;
use cleanarchitecture\domain\company\repository\CompanyRepositoryInterface;

class CompanyService implements CompanyServiceInterface
{
    private CompanyRepositoryInterface $repository;

    public function __construct(CompanyRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function search(int $idCompany)
    {
        $data['result']  = 'success';
        $data['message'] = 'Empresa não encontrada!';
        $data['company'] = [];

        try {
            $queryCompany = $this->repository->findId($idCompany);
            $dataCompany  = $queryCompany->fetch_assoc();

            if ($queryCompany->num_rows > 0) {
                $data['company'] = $dataCompany;
            }
        } catch (\Exception $e) {
            $data['result']  = 'error';
            $data['message'] = $e->getMessage();
        } finally {
            return json_encode($data);
        }
    }

    public function findAll(Pagination $pagination, CompanyFilter $filter): string
    {
        $data['result']    = 'success';
        $data['message']   = 'Nenhuma empresa encontrada!';
        $data['companies'] = [];
        $data['quantity']  = 0;

        $data['filter']['name'] = $filter->getName();

        try {
            $queryTotalRecords = $this->repository->getTotalRecords($filter);
            $dataTotalRecords  = $queryTotalRecords->fetch_assoc();
            $totalOfRecords    = (int) $dataTotalRecords['total'];

            if ($totalOfRecords === 0) {
                return json_encode($data);
            }

            $pagination->paginate($totalOfRecords);

            $queryCompany = $this->repository->fetchAll($pagination, $filter);
            $dataCompany  = $queryCompany->fetch_all(MYSQLI_ASSOC);

            $data['message']   = 'Lista de empresas.';
            $data['companies'] = $dataCompany;
            $data['quantity']  = $queryCompany->num_rows;

            $data['pagination']['current-page']               = $pagination->getCurrentPage();
            $data['pagination']['number-of-records-per-page'] = $pagination->getNumberOfRecordsPerPage();
            $data['pagination']['number-of-pages']            = $pagination->getNumberOfPages();
            $data['pagination']['number-of-records']          = $totalOfRecords;
        } catch (\Exception $e) {
            $data['result']  = 'error';
            $data['message'] = $e->getMessage();
        } finally {
            return json_encode($data);
        }
    }

    public function toAdd(Company $company)
    {
        $data['result']  = 'success';

        try {
            $queryInsert = $this->repository->insert($company);

            if ($queryInsert === true) {
                $data['message'] = 'Empresa cadastrada com sucesso!';
            }
        } catch (\Exception $e) {
            $data['result']  = 'error';
            $data['message'] = $e->getMessage();
        } finally {
            return json_encode($data);
        }
    }

    public function toEdit(Company $company)
    {
        $data['result']  = 'success';

        try {
            $queryUpdate = $this->repository->update($company);

            if ($queryUpdate === true) {
                $data['message'] = 'Empresa atualizada com sucesso!';
            }
        } catch (\Exception $e) {
            $data['result']  = 'error';
            $data['message'] = $e->getMessage();
        } finally {
            return json_encode($data);
        }
    }

    public function toRemove(int $idCompany)
    {
        $data['result']  = 'success';

        try {
            $queryDelete = $this->repository->delete($idCompany);

            if ($queryDelete === true) {
                $data['message'] = 'Empresa excluída com sucesso!';
            }
        } catch (\Exception $e) {
            $data['result']  = 'error';
            $data['message'] = $e->getMessage();
        } finally {
            return json_encode($data);
        }
    }
}
