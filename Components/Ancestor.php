<?php

namespace Components;


abstract class Ancestor
{
    const TABLE = '';

    public $id;

    /* -- CREATE -- */

    /**
     * Метод - проверка новая ли у нас модель
     * @return null
     */
    public function isNew()
    {
        return empty($this->id);
    }

    /**
     * Метод - добавляем объект в БД
     * @return bool
     */
    public function insert()
    {
        if (!$this->isNew()) { //Проверяем новый ли объект
            return;
        }

        $columns = [];
        $values = [];
        foreach ($this as $key => $val) { //Проходим по публичным свойствам объекта
            if ('id' == $key) {
                continue; // Пропускаем поле ID
            }
            $columns[] = $key; // Собираем массив свойств объекта
            $values[':' . $key] = $val; // Собираем массив свойство=значение
        } //var_dump($values); die;

        //Запрос в БД
        $sql = 'INSERT INTO ' . static::TABLE . '(' . implode(',', $columns) . ')
            VALUES (' . implode(',', array_keys($values)) . ')';
        echo $sql;
        //Выполняем запрос к БД
        $db = Db::instance();
        $res = $db->execute($sql, $values);
        //var_dump($res);
        if (false !== $res) {
            $this->id = $db->lastInsertId();
            return true;
        }
    }

    /* -- READ -- */

    /**
     * Метод - получаем массив всех записей из таблицы
     * @return mixed object
     */
    public static function findAll()
    {
        $sql = 'SELECT * FROM ' . static::TABLE;
        //var_dump($sql);
        $db = Db::instance();
        return $db->query($sql, static::class);
    }

    /**
     * Метод - получаем одну запись по ID
     * @param int $id
     * @return bool or one object News
     */
    public static function findById(int $id) //тест метода в /tests/test_lesson1.php - строка 93
    {
        //var_dump($id);
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        //var_dump($sql);
        $mass = [
            ':id' => $id,
        ];
        $db = Db::instance();
        $res = $db->query($sql, static::class, $mass);
        //var_dump($res);
        if (null == $res) {
            return false;
        } else {
            foreach ($res as $record) {
                return $record;
            }
        }
    }

    /* --  UPDATE -- */

    /**
     * Метод - обновляем значение полей модели в БД
     * @return bool
     */
    public function update()
    {
        $columns = [];
        $values = [];
        foreach ($this as $k => $v) {
            $columns[] = $k . '=:' . $k;
            $values[':' . $k] = $v;
        } //var_dump($values); //die;

        $sql = 'UPDATE ' . static::TABLE .
            ' SET ' . implode(',', $columns)
            . ' WHERE id=:id';
        //echo $sql;
        $db = Db::instance();
        $res = $db->execute($sql, $values);
        if (false !== $res) {
            return true;
        }
    }

    /**
     * Метод - сохраняем изменения в БД
     * @return bool
     */
    public function save()
    {
        if (!$this->isNew()) {
            return $this->update();
        } else {
            return $this->insert();
        }
    }

    /* --  DELETE -- */

    /**
     * Метод - удаляем запись из БД
     */
    public function delete()
    {
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=:id';
        $mass[':id'] = $this->id;
        $db = Db::instance();
        $db->execute($sql, $mass);
    }
}