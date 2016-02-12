<?php
use Model\table\News;

require __DIR__ . '/../autoload.php';

/* -- Тест update(); -- */
$user = News::findById(5);
$user->title = 'm@mv.ru';
$user->text = 'Миша';
var_dump($user);
$user->save();

/* ----------------- ДОМАШНЯЯ РАБОТА -------------------------- */

//use Models\table\User;

/* -- Тест delete(); -- */
//$user = User::findById(3);
//$user->delete();

/* -- Тест insert(); -- */
//$user = new User();
//$user->email = 'p@ya.ru';
//$user->name = 'Петя';
//$user->insert();

/* -- Тест update(); -- */
//$user = User::findById(10);
//$user->email = 'm@mv.ru';
//$user->name = 'Миша';
//var_dump($user);
//$user->update();

/* -- Тест save(); -- */
//$user = new User();
//$user = User::findById(1);
//$user->email = 'g@ya.ru';
//$user->name = 'Гриша';
//$user->save();
//var_dump($user);

/* -- Тесты Models\Config.php -- */
/*
$conf = Config::instance();
//var_dump($conf);
echo $conf->data['dbname'];
*/

/* ----------------- НА УРОКЕ --------------------------------- */

/* -- Реализация  Active Record на уроке - метод insert(); -- */
//use Models\table\User;
//$user = new User();
//$user->email = 'v@ya.ru';
//$user->name = 'Вася';
//$user->insert();

/* -- Пример с Lesson_2 - тестируем Singleton, пока еще не trait -- */
//$s = Models\Singleton::instance();
//$s->counter = 1;
//var_dump($s);

//$m = Models\Singleton::instance();
//var_dump($m);

/* -- Пример с Lesson_2 в index.php -- */
/*
require __DIR__ . '/autoload.php';

$user = User::findAll();

function sendEmail(Models\table\HastEmail $user, string $message) {
    echo 'Почта уходит на \'' . $user->email . '\', c собщением - ' . $message;
}

//var_dump($user);
sendEmail($user[0], 'Hello, Ольга!');
*/

/* -- Реализация домашней работы Index.php в Lesson_1  -- */
/*
use Models\table\News;
//$news = News::findAll(); //Получили массив ВСЕХ новостей
//var_dump($news);

$news = News::getThreeLastRecord(3); //Получаем массив последних трех новостей
//var_dump($news);
include __DIR__ . '/Templates/html/index.php'; //подключаем шаблон
*/