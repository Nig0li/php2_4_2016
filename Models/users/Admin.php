<?php

namespace Models\users;

use Models\News;

class Admin
{

    /**
     * Метод, проверки id новости
     * @param int id модели
     * @return new object News or object News from BD
     */
    public function verify(int $id)
    {
        if (empty($id)) {
            $res = new News();
        } else {
            $res = News::findById($id);
        }
        return $res;
    }

    /**
     * Метод - редактирование новости (создать/обновить)
     * @param array $mass
     * @return bool | new object News | object News from BD
     */
    public function editNews(array $mass)
    {
        if (empty($mass['title']) && empty($mass['text']) && empty($mass['author'])) {
            return false;
        } else {
            $news = $this->verify($mass['id']);
            $news->title = ($mass['title']);
            $news->text = ($mass['text']);
            $news->author = $mass['author'];
            return $news;
        }
    }

    /**
     * Метод - сохранение изменений в БД
     * @param array $mass
     */
    public function saveNews(array $mass)
    {
        $art = $this->verify($mass['id']);
        switch ($mass['author']) {
            case 'Дроздов Н.Н.':
            case 'Дроздов':
                $author = 1;
                break;
            case 'Незнайка':
                $author = 2;
                break;
            default:
                $author = 3;
                break;
        }
        $art->title = $mass['title'];
        $art->text = $mass['text'];
        $art->author_id = $author;
        $art->save();
    }

    /**
     * Метод - удаление новости по id
     * @param int $id
     */
    public function deleteNews(int $id)
    {
        $news = News::findById($id);
        if (false !== $news) {
            $news->delete();
        }
    }
}