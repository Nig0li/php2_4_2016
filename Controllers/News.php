<?php

namespace Controllers;

use Templates\php\View;

class News extends Basic
{

    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * action - Получение массива новостей
     */
    protected function actionIndex()
    {
        $this->view->news = \Models\News::findAll();
        $this->view->display(__DIR__ . '/../Templates/index.php');
    }

    /**
     * action - Получение конкретной новости по id
     */
    protected function actionArt()
    {
        $this->view->article = \Models\News::findById($_GET['id']);
        $this->view->display(__DIR__ . '/../Templates/article.php');
    }
}