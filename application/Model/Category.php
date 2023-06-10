<?php

namespace Application\Model;

class Category extends Model
{
    protected $tableName = "`categories`";

    public function getCategoriesCount()
    {
        return $this->selectMethod('SELECT COUNT(*) FROM `categories`')->fetch();
    }
}
