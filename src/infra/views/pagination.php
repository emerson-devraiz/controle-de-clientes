<?php if ($data['quantity'] > 0): ?>
<!-- PAGINAÇÃO -->
<div class="d-flex justify-content-between align-items-end mb-2">
    <div class="d-flex align-items-center">
        <?php if ($data['pagination']['number-of-records'] > $data['quantity']) : ?>
            <div class="dataTables_length" id="company-list_length">
                <label>
                    <div class="input-group me-2" style="width: fit-content;">
                        <span class="input-group-text" id="itens">Exibir</span>
                        <select id="records-per-page" class="form-select" aria-describedby="itens">
                            <option value="15" <?= ($data['pagination']['number-of-records-per-page'] === 15) ? 'selected' : ''; ?>>15</option>
                            <option value="25" <?= ($data['pagination']['number-of-records-per-page'] === 25) ? 'selected' : ''; ?>>25</option>
                            <option value="35" <?= ($data['pagination']['number-of-records-per-page'] === 35) ? 'selected' : ''; ?>>35</option>
                        </select>
                        <span class="input-group-text" id="itens">por página</span>
                    </div>
                </label>
            </div>
            <div>Mostrando: <b><?= $data['quantity']; ?></b> registros de <b><?= $data['pagination']['number-of-records']; ?></b> | página <?= $data['pagination']['current-page'] ?> de <?= $data['pagination']['number-of-pages'] ?></div>
        <?php else :  ?>
            <div>Total de registros: <b><?= $data['quantity']; ?></b></div>
        <?php endif; ?>
    </div>

    <?php if ($data['pagination']['number-of-records'] > $data['quantity']) : ?>
        <nav>
            <ul class="pagination">

                <!-- Mostra seta que move para primeira página -->
                <?php if ($data['pagination']['current-page'] > 4) : ?>
                    <li class="page-item">
                        <a class="page-link" title="primeira página" page="1" href="<?= '/' . $view; ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php

                for ($i = 1; $i <= $data['pagination']['number-of-pages']; $i++) :

                    $activeClass  = ($data['pagination']['current-page'] === $i) ? 'active' : '';

                ?>
                    <!-- Mostra apenas 3 páginas antes e 3 depois da página que está selecionada -->
                    <?php if ($i >= ($data['pagination']['current-page'] - 3) && $i <= ($data['pagination']['current-page'] + 3)) : ?>

                        <li class="page-item <?= $activeClass; ?>"><a class="page-link" page="<?= $i; ?>" href="<?= '/' . $view; ?>"><?= $i; ?></a></li>

                    <?php endif; ?>

                <?php endfor; ?>

                <!-- Mostra seta que move para última página -->
                <?php if (($data['pagination']['number-of-pages'] - $data['pagination']['current-page']) > 3) : ?>
                    <li class="page-item">
                        <a class="page-link" title="última página" page="<?= $data['pagination']['number-of-pages']; ?>" href="<?= '/' . $view; ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    <?php endif; ?>
</div>
<?php endif; ?>