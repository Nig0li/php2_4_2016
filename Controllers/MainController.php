<?php

namespace Controllers;


class MainController extends Basic
{
    protected $name;

    public function __construct()
    {
        $this->name = '\Controllers\\' . ($_GET['ctrl'] ?: 'News');
    }

    protected function actionName()
    {
        return $this->name;
    }

    protected function actionAction()
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