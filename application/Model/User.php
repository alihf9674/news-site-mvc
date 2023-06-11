<?php

namespace Application\Model;

class User extends Model
{
    protected $tableName = "`users`";

    public function findUserByEmailMethod($email)
    {
        return $this->selectMethod('SELECT * FROM `users` WHERE `user_email` = ?', [$email])->fetch();
    }

    public function getAdminsCountMethod()
    {
        return $this->selectMethod('SELECT COUNT(*) FROM `users` WHERE `permission` = "admin"')->fetch();
    }

    public function getUsersCountMethod()
    {
        return $this->selectMethod('SELECT COUNT(*) FROM `users` WHERE `permission` = "user"')->fetch();
    }

    public function findUserByTokenMethod($token)
    {
        return $this->selectMethod('SELECT * FROM `users` WHERE `verify_token` = ? AND `is_active` = 0', [$token])->fetch();
    }

    public function findUserByForgotTokenMethod($token)
    {
        return $this->selectMethod('SELECT * FROM `users` WHERE `forgot_token` = ?', [$token])->fetch();
    }
}