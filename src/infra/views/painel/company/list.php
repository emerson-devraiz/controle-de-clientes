<div class="row mt-3">
    <div class="col-6">
        <h2>Empresas</h2>
    </div>
    <div class="col-6 text-end">
        <a href="/painel/company/render" class="btn btn-primary" role="button" data-bs-toggle="submit">NOVA EMPRESA</a>
    </div>
</div>

<form action="/painel/company/list/" name="formFiltro" method="GET">
    <div class="row">
        <div class="col-lg-5">
            <label for="name" class="form-label ms-1 mb-1">Nome</label>
            <input id="name" name="name" type="text" class="form-control" aria-label="Nome" placeholder="Nome" value="<?= $data['filter']['name']; ?>">
        </div>
        <div class="col-auto d-flex align-items-end">
            <button id="filter" name="filter" class="btn btn-secondary" type="submit" value="filter" onclick="onFilter(this);">FILTRAR</button>
        </div>
    </div>
</form>


<table id="company-list" class="table table-hover align-middle data-table-list">
    <thead>
        <tr>
            <th class="text-center" style="width: 80px;">ID</th>
            <th scope="col">NOME</th>
            <th scope="col" style="width: 250px;">CNPJ</th>
            <th scope="col" style="width: 100px;"></th>
            <th scope="col" style="width: 50px;"></th>
        </tr>
    </thead>

    <?php if (empty($data['companies']) === false) : ?>
        <tbody class="table-group-divider">
            <?php foreach ($data['companies'] as $company) : $secret = '123'; ?>
                <tr>
                    <th class="text-center" scope="row"><?= $company['id_company']; ?></th>
                    <td><?= $company['name']; ?></td>
                    <td><?= $this->maskCnpj($company['cnpj']); ?></td>
                    <td>
                        <!-- <a href="</?= URL_BASE; ?>login/auth-adm/</?= $this->encrypt($secret); ?>" target="_blank" class="btn btn-secondary btn-sm" role="button" data-bs-toggle="submit">ACESSAR</a> -->
                    </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn dropdown-toggle dropdown-rounded light-hover" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical text-primary"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item light-hover" href="/painel/company/render/<?= $this->encrypt($company['id_company']); ?>">
                                        <i class="bi bi-pencil"></i>
                                        <span>Alterar</span>
                                    </a>
                                </li>
                                <!-- <li>
                                    <a class="dropdown-item light-hover" href="/painel/user/list/</?= $this->encrypt($company['id_company']); ?>">
                                        <i class="bi bi-people-fill"></i>
                                        <span>Usuários</span>
                                    </a>
                                </li> -->
                                <li>
                                    <a class="dropdown-item text-danger light-hover" href="javascript:void(0);" onclick="deleteCompany('<?= $this->encrypt($company['id_company']); ?>');">
                                        <i class="bi bi-trash"></i>
                                        <span>Excluir</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    <?php endif; ?>
</table>


<?php require '../src/infra/views/pagination.php'; ?> 
