<?php

namespace Components;


class Db
{
    use Singleton;

    protected $dbh;

    /**
     * Db constructor подключение к БД
     */
    protected function __construct()
    {
        $this->dbh = new \PDO('mysql:host=localhost;dbname=test', 'root', '');
    }

    /**
     * Метод - запрос к БД
     * @param string $sql
     * @param array $params
     * @return bool
     */
    public function execute(string $sql, array $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);
        return $res;
    }

    /**
     * Метод - получение данных из БД
     * @param string $sql
     * @param $className
     * @param array $mass
     * @return array
     */
    public function query(string $sql, $className, array $mass = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($mass);
        if (false !== $res) {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $className);
        }
        return [];
    }

    /**
     * Метод - возвращает id последней добавленной записи
     * @return string
     */
    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
}