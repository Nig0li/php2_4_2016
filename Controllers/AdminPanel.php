<?php

namespace Controllers;

use Models\News;
use Templates\php\View;

class AdminPanel extends Basic
{

    protected $view;
    protected $news;
    protected $mass = [];

    public function __construct()
    {
        $this->view = new View();

        $this->mass = [
            'id' => (int)$_POST['id'],
            'title' => $_POST['title'],
            'text' => $_POST['text'],
            'author' => $_POST['author']
        ];

        if (empty($this->mass['id'])) {
            $res = new News();
        } else {
            $res = News::findById($this->mass['id']);
        }
        $this->news = $res;
    }

    /**
     * action - Получение массива всех новостей
     */
    protected function actionNewsAll()
    {
        $this->view->news = \Models\News::findAll();
        $this->view->display(__DIR__ . '/../Templates/adminNews.php');
    }

    /**
     * action - Получение массива последних 2х новостей
     */
    protected function actionLimitNews()
    {
        $this->view->news = News::getThreeLastRecord(2);
        $this->view->display(__DIR__ . '/../Templates/adminNews.php');
    }

    /**
     * action - Редактирование новости (создать/обновить)
     */
    protected function actionEdit()
    {
        if (!empty($this->mass['title']) || !empty($this->mass['text']) || !empty($this->mass['author'])) {
            $this->view->article = $this->news->fill($this->mass);
            $this->view->display(__DIR__ . '/../Templates/editNews.php');
        } else {
            header('Location: /../index.php?ctrl=AdminPanel');
        }
    }

    /**
     * action - Сохранение изменений
     */
    protected function actionSave()
    {
        $this->news->fill($this->mass);
        $this->news->save();
        header('Location: /../index.php?ctrl=AdminPanel');
    }

    /**
     * action - Удаление новости по id
     */
    protected function actionDelete()
    {
        $art = News::findById((int)$_GET['id']);
        $art->delete();
        header('Location: /../index.php?ctrl=AdminPanel'); exit(0);
    }
}