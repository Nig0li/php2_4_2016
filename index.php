<?php

require __DIR__ . '/autoload.php';

$mainController = new \Controllers\MainController();

$name = $mainController->action('Name');
$action = $mainController->action('Action');

$controller = new $name();
$controller->action($action);