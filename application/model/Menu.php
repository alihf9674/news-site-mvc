<?php

namespace Application\Model;

class Menu extends Model
{
    public $tableName = '`menus`';

    public function getParentNameMenu()
    {
        return $this->select('SELECT m1.*, m2.`name` AS parent_name FROM `menus` m1
        LEFT JOIN `menus` m2 ON m1.`parent_id` = m2.`id` ORDER BY `id` DESC')->fetchAll();
    }

    public function getParentMenus()
    {
        return $this->select('SELECT * FROM `menus` WHERE `parent_id` IS NULL')->fetchAll();
    }
}