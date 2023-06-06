<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/painel/company/list">Empresas</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $data['title']; ?></li>
    </ol>
</nav>

<div class="d-flex flex-column justify-content-center align-items-center">
    <div class="card width-form">
        <div class="card-header text-center">
            <h2><?= $data['title']; ?></h2>
        </div>
        <div class="card-body">
            <form id="formCompany" action="/painel/company/<?= $data['action']; ?>" method="POST">
                <input id="id_company" name="id_company" type="hidden" value="<?= (isset($data['id_company']) === true) ? $data['id_company'] : '0'; ?>">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" name="name" obrigatorio="true" nome-validar="Nome" placeholder="Nome da empresa" maxlength="55" value="<?= (isset($data['company']) === true) ? $data['company']['name'] : ''; ?>">
                            <label for="name">Nome</label>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control cnpj only-numbers" id="cnpj" name="cnpj" obrigatorio="true" nome-validar="CNPJ" placeholder="CNPJ" value="<?= (isset($data['company']) === true) ? $data['company']['cnpj'] : ''; ?>">
                            <label for="cnpj">CNPJ</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control email" id="email" name="email" obrigatorio="true" nome-validar="E-mail" placeholder="E-mail" maxlength="70" value="<?= (isset($data['company']) === true) ? $data['company']['email'] : ''; ?>">
                            <label for="email">E-mail</label>
                        </div>
                    </div>
                </div>
                <div class="text-end">
                    <a class="btn btn-danger btn-form" href="/painel/company/list" role="button">CANCELAR</a>
                    <button id="save" name="save" preloader="true" type="submit" class="btn btn-primary btn-form" onclick="return validateDataCompany(this);">SALVAR</button>
                </div>
            </form>
        </div>
    </div>

</div>