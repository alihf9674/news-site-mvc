<?php

namespace Application\Model;

class Post extends Model
{
      public function find($id)
      {
            return $this->select('SELECT * FROM `posts` WHERE `id` = ?', [$id])->fetch();
      }

      public function getPostsInfo()
      {
            return $this->select('SELECT `posts`.*, `categories`.`name` AS category_name, `users`.`username` AS user_name FROM `posts`
            LEFT JOIN `categories` ON `categories`.`id` = `posts`.`cat_id`
            LEFT JOIN `users` ON `users`.`id` = `posts`.`user_id` ORDER BY `id` DESC')->fetchAll();
      }
}
