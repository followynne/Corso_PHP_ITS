<?php
declare(strict_types=1);

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

use DI\ContainerBuilder;
use SimpleMVC\Controller\Error404;

$builder = new ContainerBuilder();
$builder->addDefinitions('config/container.php');
$container = $builder->build();

// Routing
$uri = $_SERVER['REQUEST_URI'];
// Strip query string (?foo=bar) and decode URI
$pos = strpos($uri, '?');
if (false !== $pos) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routes = require 'config/route.php';
if (isset($routes[$uri])) {
    $controller = new $routes[$uri];
    return $controller->execute($container);
} else {
    $error = new Error404();
    return $error->execute($container);
}
