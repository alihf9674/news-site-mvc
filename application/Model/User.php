<?php

namespace Application\Model;

class User extends Model
{
    protected $tableName = "`users`";

    public function getUserByEmailMethod($email)
    {
        return $this->selectMethod('SELECT `user_email` FROM `users` WHERE `user_email = ?', [$email])->fetch();
    }
}