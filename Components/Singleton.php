<?php

namespace Components;


trait Singleton
{
    protected static $instance;

    /**
     * Защищенный конструктор
     * Singleton constructor.
     */
    protected function __construct()
    {
    }

    /**
     * Метод - создание singleton object
     * @return new object or existing object
     */
    public static function instance()
    {
        if (null === static::$instance) {
            static::$instance = new static ;
        }
        return static::$instance;
    }
}