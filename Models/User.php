<?php

namespace Models;

use Components\Ancestor;

class User extends Ancestor
    implements HastEmail
{
    const TABLE = 'users';

    public $email;
    public $name;

    /**
     * Метод, возвращающий адрес e-mail
     * @return string Адрес электронной почты
     */
    public function getEmail()
    {
        return $this->email;
    }
}