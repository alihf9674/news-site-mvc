<?php

namespace Application\Model;

class User extends Model
{
    public function all()
    {
        return $this->select('SELECT * from Users order by `id` DESC')->fetchAll();
    }

    public function find($id)
    {
        return $this->select('SELECT * from Users where `id` = ?', [$id])->fetch();
    }
}