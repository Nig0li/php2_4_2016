<?php

namespace Controllers;


class Index extends Basic
{
    protected $name;

    public function __construct()
    {
        $this->name = '\Controllers\\' . ($_GET['ctrl'] ?: 'News');
    }


    /**
     * action - имя конструктора
     * @return string
     */
    protected function actionName()
    {
        return $this->name;
    }

    /**
     * action - action конструктора
     * @return string
     */
    protected function actionSelect()
    {
        switch ($this->name) {
            case '\Controllers\News':
                $action = $_GET['action'] ?: 'Index';
                break;
            case '\Controllers\AdminPanel':
                $action = $_GET['action'] ?: 'NewsAll';
                break;
        }
        return $action;
    }
}