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

    <link href="<?= PATH_CDN; ?>/vali/css/main.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header">
        <!-- <a class="app-header__logo" href="index.html">Vali</a> -->
        <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
        <!-- Navbar Right Menu-->
        <ul class="app-nav">
            <li class="app-search">
                <input class="app-search__input" type="search" placeholder="Search">
                <button class="app-search__button"><i class="fa fa-search"></i></button>
            </li>
            <!--Notification Menu-->
            <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
                <ul class="app-notification dropdown-menu dropdown-menu-right">
                    <li class="app-notification__title">Você possui 3 novas notificações.</li>
                    <div class="app-notification__content">
                        <li>
                            <a class="app-notification__item" href="javascript:;">
                                <span class="app-notification__icon">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                        <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                                    </span>
                                </span>
                                <div>
                                    <p class="app-notification__message">Emerson enviou um e-mail</p>
                                    <p class="app-notification__meta">2 min atrás</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="app-notification__item" href="javascript:;"><span class="app-notification__icon">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-circle fa-stack-2x text-danger"></i>
                                        <i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i>
                                    </span>
                                </span>
                                <div>
                                    <p class="app-notification__message">Servidor de e-mail fora do ar</p>
                                    <p class="app-notification__meta">5 min atrás</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="app-notification__item" href="javascript:;">
                                <span class="app-notification__icon">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-circle fa-stack-2x text-success"></i>
                                        <i class="fa fa-money fa-stack-1x fa-inverse"></i>
                                    </span>
                                </span>
                                <div>
                                    <p class="app-notification__message">Transação efetuada com sucesso!</p>
                                    <p class="app-notification__meta">2 dias atrás</p>
                                </div>
                            </a>
                        </li>                        
                    </div>
                    <li class="app-notification__footer"><a href="#">Visualizar todas as notificações.</a></li>
                </ul>
            </li>
            <!-- User Menu-->
            <li class="dropdown">
                <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <li><a class="dropdown-item" href="!#"><i class="fa fa-cog fa-lg"></i> Configurações</a></li>
                    <li><a class="dropdown-item" href="!#"><i class="fa fa-user fa-lg"></i> Perfil</a></li>
                    <li><a class="dropdown-item" href="!#"><i class="fa fa-sign-out fa-lg"></i> Sair</a></li>
                </ul>
            </li>
        </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <!-- <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
            <div>
                <p class="app-sidebar__user-name">Emerson Silveira</p>
                <p class="app-sidebar__user-designation">Desenvolvedor Full-stack</p>
            </div>
        </div> -->
        <ul class="app-menu">
            <li>
                <a class="app-menu__item" href="/web/home">
                    <i class="app-menu__icon fa fa-home"></i>
                    <span class="app-menu__label">Home</span>
                </a>
            </li>
            <!-- <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-edit"></i>
                    <span class="app-menu__label">Forms</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="form-components.html"><i class="icon fa fa-circle-o"></i> Form Components</a></li>
                    <li><a class="treeview-item" href="form-custom.html"><i class="icon fa fa-circle-o"></i> Custom Components</a></li>
                    <li><a class="treeview-item" href="form-samples.html"><i class="icon fa fa-circle-o"></i> Form Samples</a></li>
                    <li><a class="treeview-item" href="form-notifications.html"><i class="icon fa fa-circle-o"></i> Form Notifications</a></li>
                </ul>
            </li> -->
        </ul>
    </aside>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-home"></i> Home</h1>
                <!-- <p>Start a beautiful journey here</p> -->
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ul>
        </div>

        <?php require '../src/infra/views/' . $view . '.php'; ?>
    </main>

    <!-- Essential javascripts for application to work-->
    <script type="text/javascript" src="<?= PATH_CDN; ?>/vali/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="<?= PATH_CDN; ?>/vali/js/popper.min.js"></script>
    <script type="text/javascript" src="<?= PATH_CDN; ?>/vali/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= PATH_CDN; ?>/vali/js/main.js"></script>

    <!-- The javascript plugin to display page loading on top-->
    <script type="text/javascript" src="<?= PATH_CDN; ?>/vali/js/plugins/pace.min.js"></script>

    <script type="text/javascript" src="<?= PATH_CDN; ?>/cookie.js"></script>

    <script type="text/javascript" src="/js/pagination.js"></script>

    <?php if (file_exists('js/' . $view . '.js')) : ?>
        <script type="text/javascript" src="/js/<?= $view; ?>.js"></script>
    <?php endif; ?>
</body>

</html>