<?php

namespace Controllers;

use Models\News;
use Models\users\Admin;
use Templates\php\View;

class AdminPanel extends Basic
{

    protected $view;
    protected $admin;
    protected $mass = [];

    public function __construct()
    {
        $this->view = new View();
        $this->admin = new Admin();

        $this->mass = [
            'id' => $_POST['id'],
            'title' => $_POST['title'],
            'text' => $_POST['text'],
            'author' => $_POST['author']
        ];
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
     * action - Получение конкретной новости по id
     * @deprecated
     */
    protected function actionArt()
    {
        $this->view->article = \Models\News::findById($_GET['id']);
        $this->view->display(__DIR__ . '/../Templates/createNews.php');
    }

    /**
     * action - Редактирование новости (создать/обновить)
     */
    protected function actionEdit()
    {
        $res = $this->admin->editNews($this->mass);
        if (false !== $res) {
            $this->view->article = $res;

            if (isset($_POST['create'])) {
                $this->view->display(__DIR__ . '/../Templates/createNews.php');
            }
            if (isset($_POST['update'])) {
                $this->view->display(__DIR__ . '/../Templates/updateNews.php');
            }

        } else {
            header('Location: /../index.php?ctrl=AdminPanel');
        }
    }

    /**
     * action - Сохранение изменений
     */
    protected function actionSave()
    {
        $this->admin->saveNews($this->mass);
        header('Location: /../index.php?ctrl=AdminPanel');
    }

    /**
     * action - Удаление новости по id
     */
    protected function actionDelete()
    {
        $this->admin->deleteNews($_GET['id']);
        header('Location: /../index.php?ctrl=AdminPanel'); exit(0);
    }
}