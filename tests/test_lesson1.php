<?php
use Model\Db;
use Model\table\News;

require __DIR__ . '/../autoload.php';

/* -- Тесты execute(); query() findById($id) для Lesson_1 -- */

//$test = new Db();
//var_dump($test);
/*
Вывод на экран var_dump($test);
object(Models\Db)#1 (1) {
  ["dbh":protected]=>
  object(PDO)#2 (0) {
  }
}
*/

$sqlOne = 'SELECT * FROM users';
//var_dump($sqlOne); //проверка на корректность запроса
/*
Вывод на экран var_dump($sql);
string(19) "SELECT * FROM users"
*/
$sqlTwo = 'SELECT * FROM users WHERE id=:id';
//var_dump($sqlTwo);
/*
Вывод на экран var_dump($sql);
string(32) "SELECT * FROM users WHERE id=:id"
*/
$mass = [
    ':id' => 1
];
//var_dump($mass);
/*
Вывод на экран var_dump($mass);
array(1) {
  [":id"]=>
  int(1)
}
*/

/* -- Проверка метода execute() -- */
$res1 = $test->execute($sqlOne);
//var_dump($res1);
/*
Вывод на экран var_dump($res1);
bool(true) - значит все прошло успешно
*/
$res2 = $test->execute($sqlTwo, $mass);
//var_dump($res2);
/*
Вывод на экран var_dump($res2);
bool(true) - значит все прошло успешно
*/

/* -- Проверка метода query() -- */
$className1 = 'Models\table\User';
$res3 = $test->query($sqlTwo, $className1, $mass);
//var_dump($res3);
/*
Вывод на экран var_dump($res3);
array(1) {
  [0]=>
  object(Models\table\User)#4 (3) {
    ["email"]=>
    string(16) "test@example.com"
    ["name"]=>
    string(21) "Иван Иванов"
    ["id"]=>
    string(1) "1"
  }
}
*/
$className2 = \Model\table\User::class;
$res4 = $test->query($sqlTwo, $className2, $mass);
//var_dump($res4);
/*
Вывод на экран var_dump($res4);
array(1) {
  [0]=>
  object(Models\table\User)#5 (3) {
    ["email"]=>
    string(16) "test@example.com"
    ["name"]=>
    string(21) "Иван Иванов"
    ["id"]=>
    string(1) "1"
  }
}
*/

/* -- Проверка static function findById($id) -- */
$res5 = News::findById(8);
//var_dump($res5);
/*
Вывод на экран var_dump($res5);
В случае, если переданный ID отсутствует в таблице БД, то результат bool(false)
*/