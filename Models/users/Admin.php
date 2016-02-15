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
            $news = $this->verify((int)$mass['id']);
            $news->title = strip_tags($mass['title']);
            $news->text = strip_tags($mass['text']);
            $news->author = strip_tags($mass['author']);
            return $news;
        }
    }

    /**
     * Метод - сохранение изменений в БД
     * @param array $mass
     */
    public function saveNews(array $mass)
    {
        $art = $this->verify((int)$mass['id']);
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
        $art->title = strip_tags($mass['title']);
        $art->text = strip_tags($mass['text']);
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