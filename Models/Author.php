<?php

namespace Models;

use Components\Ancestor;

class Author extends Ancestor
{
    /**
     * @param const Имя таблицы в БД
     */
    const TABLE = 'authors';

    /**
     * @param string Имя автора
     */
    public $name;
}