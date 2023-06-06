<?php

use cleanarchitecture\app\core\Router;
use DI\ContainerBuilder;

require '../vendor/autoload.php';
require '../src/infra/config/config.php';

$httpRequest = $_SERVER['REQUEST_METHOD'];

$router  = new Router();
$context = $router->getContext();
$route   = $router->getRoute();
$action  = $router->getAction();

if (array_search($context, ['painel', 'web', 'api']) === false) {
    http_response_code(404);
    exit;
}

require '../src/infra/config/' . $context . '/config.php';

$pathDependencies = '../src/infra/config/dependencies.php';
$pathRoutes       = '../src/infra/routes/' . $context . '/' . $route . '.php';

if (file_exists($pathRoutes) === false) {
    http_response_code(404);
    exit;
}

// $pathDependenciesRoute = '../src/infra/config/' . $context . '/dependencies/' . $route . '/config.php';
// if (file_exists($pathDependenciesRoute) === true) {
//     $pathDependencies = $pathDependenciesRoute;
// }

$routes = require $pathRoutes;

$key = $httpRequest . '|' . $action;

if (array_key_exists($key, $routes) === false) {
    http_response_code(404);
    exit;
}

if ($router->isLogin() === false) {
    // Validar acesso
}

session_start();

try {
    $class = $routes[$key];

    $builder = new ContainerBuilder();
    $builder->useAttributes(true);
    $builder->addDefinitions($pathDependencies);

    $container = $builder->build();

    $controller = $container->get($class);
    $controller->run($context);
} catch (\Exception $e) {
    echo $e->getMessage();
}
