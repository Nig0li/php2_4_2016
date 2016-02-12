<?php

namespace Components;

/**
 * trait Templates
 * @package Components
 */
trait View
{
    protected $data = [];

    /**
     * "Магический" метод __set
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * "Магический" метод __get
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->data[$name];
    }

    /**
     * "Магический" метод __isset
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->data[$name]);
    }
}