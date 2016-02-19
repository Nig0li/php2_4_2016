<?php

require __DIR__ . '/autoload.php';

$router = new \Components\Router();
$route = $router->process($_GET);
$controllerName = $route['controller'];
$actionName = $route['action'];

$controller = new $controllerName();
$controller->action($actionName);
