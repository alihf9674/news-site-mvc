<?php

namespace Application\Model;

class User extends Model
{
    protected $tableName = "`users`";

    public function findUserByEmailMethod($email)
    {
        return $this->selectMethod('SELECT * FROM `users` WHERE `user_email = ?', [$email])->fetch();
    }

    public function findUserByTokenMethod($token)
    {
        return $this->selectMethod('SELECT * FROM `users` WHERE `verify_token` = ?', [$token]);
    }
}