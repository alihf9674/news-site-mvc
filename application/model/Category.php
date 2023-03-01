<?php

namespace Application\Model;

class Category extends Model
{
      public function all()
      {
            $categories = $this->select('SELECT * FROM `categories`')->fetchAll();
            return $categories;
      }

      public function find($id)
      {
            $category = $this->select('SELECT * FROM `categories` WHERE `id` = ?', [$id])->fetch();
            return $category;
      }

}
