<?php

namespace Application\Model;

class Category extends Model
{
    protected $tableName = "`categories`";

    public function getCategoriesCountMethod()
    {
        return $this->selectMethod('SELECT COUNT(*) FROM `categories`')->fetch();
    }
}
