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
        $this->view->title = 'Мой крутой сайт'; //для примера с урока
        $this->view->news = \Models\News::findAll();
        $this->view->display(__DIR__ . '/../Templates/index.php');
    }

    /**
     * action - Получение конкретной новости по id
     */
    protected function actionArt()
    {
        $id = (int)$_GET['id'];
        $this->view->article = \Models\News::findById($id);
        $this->view->display(__DIR__ . '/../Templates/article.php');
    }
}