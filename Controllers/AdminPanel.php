<?php

namespace Controllers;

use Models\News;
use Models\users\Admin;
use Templates\php\View;

class AdminPanel extends Basic
{

    protected $view;
    protected $admin;
    protected $data = [];

    public function __construct()
    {
        $this->view = new View();
        $this->admin = new Admin();

        $mass = [
            'id' => (int)$_POST['id'],
            'title' => strip_tags($_POST['title']),
            'text' => strip_tags($_POST['text']),
            'author' => strip_tags($_POST['author'])
        ];
        $this->data = $mass;
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
        $id = (int)$_GET['id'];
        $this->view->article = \Models\News::findById($id);
        $this->view->display(__DIR__ . '/../Templates/createNews.php');
    }

    /**
     * action - Редактирование новости (создать/обновить)
     */
    protected function actionEdit()
    {
        $res = $this->admin->editNews($this->data);
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
        $this->admin->saveNews($this->data);
        header('Location: /../index.php?ctrl=AdminPanel');
    }

    /**
     * action - Удаление новости по id
     */
    protected function actionDelete()
    {
        $id = (int)$_GET['id'];
        $this->admin->deleteNews($id);
        header('Location: /../index.php?ctrl=AdminPanel'); exit(0);
    }
}