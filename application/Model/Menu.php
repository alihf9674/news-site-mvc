<?php

namespace Application\Model;

class Menu extends Model
{
    protected $tableName = '`menus`';

    public function getParentNameMenuMethod()
    {
        return $this->selectMethod('SELECT m1.*, m2.`name` AS parent_name FROM `menus` m1
        LEFT JOIN `menus` m2 ON m1.`parent_id` = m2.`id` ORDER BY `id` DESC')->fetchAll();
    }

    public function getParentMenusMethod()
    {
        return $this->selectMethod('SELECT * FROM `menus` WHERE `parent_id` IS NULL')->fetchAll();
    }
}