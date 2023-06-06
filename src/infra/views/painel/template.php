<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="light">

<head>
    <title><?= TITLE; ?></title>
    <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Language" content="pt-br">
    <meta http-equiv="Cache-Control" content="no-cache, no-store">
    <meta http-equiv="expires" content="Mon, 06 Jan 1990 00:00:01 GMT">
    <meta name="robots" content="index, follow">
    <meta name="Category" content="business">
    <meta name="title" content="<?= TITLE; ?>">
    <meta name="url" content="<?= URL_BASE; ?>">
    <meta name="geo.region" content="BR-PR">
    <meta name="geo.placename" content="Assis">
    <meta name="autor" content="Focus Sistemas - Acessoria e Suporte">
    <meta name="company" content="Focus Sistemas - Acessoria e Suporte">
    <meta name="revisit-after" content="10">

    <link href="<?= PATH_CDN; ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= PATH_CDN; ?>/bootstrap/icons/font/bootstrap-icons.css" rel="stylesheet" type="text/css">
    <link href="<?= PATH_CDN; ?>/toast/sweetalert2.css" rel="stylesheet" type="text/css">
    <link href="/css/painel/custom.css" rel="stylesheet" type="text/css">

    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }
    </style>

</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid ps-1 pe-0">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/painel/home">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/painel/company/list">EMPRESAS</a>
                    </li>
                </ul>
            </div>

            <div>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link fs-3" href="/logout" style="width: 70px; text-align: center; padding-left: 20px;">
                            <i class="bi bi-box-arrow-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="container-fluid">
            <?php require '../src/infra/views/' . $view . '.php'; ?>
        </div>
    </main>

    <div class="container-fluid sticky-bottom bg-white">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-2 border-top" style="height: 49px;">
            <div class="col-md-6 d-flex align-items-center">
                <div>
                    <span class="text-muted"><b>Admin: </b>Emerson Silveira</span>
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-end align-items-center">
                <div>
                    <span class="text-muted">© <?= YEAR; ?> Grupo devRaiz</span>
                </div>
            </div>
        </footer>
    </div>

    <script type="text/javascript" src="<?= PATH_CDN; ?>/jQuery/jquery.js"></script>
    <script type="text/javascript" src="<?= PATH_CDN; ?>/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?= PATH_CDN; ?>/toast/sweetalert2.js"></script>
    <script type="text/javascript" src="<?= PATH_CDN; ?>/validate/form.js"></script>
    <script type="text/javascript" src="<?= PATH_CDN; ?>/mask/mask.min.js"></script>
    <script type="text/javascript" src="<?= PATH_CDN; ?>/mask/maskMoney.js"></script>
    <script type="text/javascript" src="<?= PATH_CDN; ?>/mask/Masks.js"></script>
    <script type="text/javascript" src="<?= PATH_CDN; ?>/cookie.js"></script>


    <script type="text/javascript" src="/js/pagination.js"></script>

    <?php if (file_exists('js/' . $view . '.js')) : ?>
        <script type="text/javascript" src="/js/<?= $view; ?>.js"></script>
    <?php endif; ?>

    <?php if (isset($data['alert']) === true) : ?>
        <script>
            Swal.fire({
                icon: '<?= $data['alert-type']; ?>',
                title: '<?= $data['alert-title']; ?>',
                html: '<?= $data['alert-message']; ?>',
                showConfirmButton: false,
                timer: 3550
            });
        </script>
    <?php endif; ?>

</body>

</html>