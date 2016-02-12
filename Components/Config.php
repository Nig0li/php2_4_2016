<?php

namespace Components;


class Config
{
    use Singleton;

    public $data = [];

    /**
     * Конструктор сохраняет параметры config.php в public $data
     * Config constructor.
     */
    protected function __construct()
    {
        $this->data = include __DIR__ . '/../config.php';
    }
}