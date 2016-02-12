<?php

require __DIR__ . '/autoload.php';

$index = new \Controllers\Index();
$nameCont = $index->action('Name'); //имя контроллера: Новости или Админ-панель
$action = $index->action('Select'); //экшн контроллера
$controller = new $nameCont(); // создание объекта контроллера
$controller->action($action); //вызов action контроллера