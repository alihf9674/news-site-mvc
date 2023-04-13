<?php

namespace Application\Model;

class User extends Model
{
    protected $tableName = "`users`";

    public function getUserByEmailMethod($email)
    {
        return $this->selectMethod('SELECT `user_call` FROM `users` WHERE `user_call = ?', [$email])->fetch();
    }
}