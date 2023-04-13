<?php

namespace Application\Model;

class Post extends Model
{
    protected $tableName = "`posts`";

      public function getPostsInfoMethod()
      {
            return $this->selectMethod('SELECT `posts`.*, `categories`.`name` AS category_name, `users`.`username` AS user_name FROM `posts`
            LEFT JOIN `categories` ON `categories`.`id` = `posts`.`cat_id`
            LEFT JOIN `users` ON `users`.`id` = `posts`.`user_id` ORDER BY `id` DESC')->fetchAll();
      }
}
