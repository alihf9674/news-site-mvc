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

    public function getTopSelectedPostsMethod()
    {
        return $this->selectMethod('SELECT `posts`.*, 
        (SELECT COUNT(*) FROM `comments` WHERE `comments`.`post_id` = `posts`.`id`) As comments_count,
        (SELECT `username` FROM `users` WHERE `users`.`id` = `posts`.`user_id`) AS user_name,
        (SELECT `name` FROM `categories` WHERE `categories`.`id` = `posts`.`cat_id`) AS category 
        FROM `posts` WHERE `posts`.`selected` = 1 ORDER BY `created_at` DESC LIMIT 0,3')->fetchAll();
    }

    public function getBreakingNewsMethod()
    {
        return $this->selectMethod('SELECT * FROM `posts` WHERE `breaking_news` = 1 ORDER BY `created_at` DESC LIMIT 1')->fetchAll();
    }

    public function getLastPostsMethod()
    {
        return $this->selectMethod('SELECT `posts`.*, 
        (SELECT COUNT(*) FROM `comments` WHERE `comments`.`post_id` = `posts`.`id`) As comments_count,
        (SELECT `username` FROM `users` WHERE `users`.`id` = `posts`.`user_id`) AS user_name,
        (SELECT `name` FROM `categories` WHERE `categories`.`id` = `posts`.`cat_id`) AS category 
        FROM `posts` ORDER BY `created_at` DESC LIMIT 0,5')->fetchAll();
    }

    public function getPopularPostsMethod()
    {
        return $this->selectMethod('SELECT `posts`.*, 
        (SELECT COUNT(*) FROM `comments` WHERE `comments`.`post_id` = `posts`.`id`) As comments_count,
        (SELECT `username` FROM `users` WHERE `users`.`id` = `posts`.`user_id`) AS user_name,
        (SELECT `name` FROM `categories` WHERE `categories`.`id` = `posts`.`cat_id`) AS category 
        FROM `posts` ORDER BY `view` DESC LIMIT 0,5')->fetchAll();
    }

    public function getMostCommentedPostsMethod()
    {
        return $this->selectMethod('SELECT `posts`.*, 
        (SELECT COUNT(*) FROM `comments` WHERE `comments`.`post_id` = `posts`.`id`) As comments_count,
        (SELECT `username` FROM `users` WHERE `users`.`id` = `posts`.`user_id`) AS user_name,
        (SELECT `name` FROM `categories` WHERE `categories`.`id` = `posts`.`cat_id`) AS category 
        FROM `posts` ORDER BY `comments_count` DESC LIMIT 0,5')->fetchAll();
    }

    public function findDetailsPostMethod($id)
    {
        return $this->selectMethod('SELECT `posts`.*, 
        (SELECT COUNT(*) FROM `comments` WHERE `comments`.`post_id` = `posts`.`id`) As comments_count,
        (SELECT `username` FROM `users` WHERE `users`.`id` = `posts`.`user_id`) AS user_name,
        (SELECT `name` FROM `categories` WHERE `categories`.`id` = `posts`.`cat_id`) AS category
        FROM `posts` WHERE `id` = ?', [$id])->fetch();
    }

    public function getCategoryPostsMethod($cat_id)
    {
            $this->selectMethod('SELECT `posts`.*, (SELECT COUNT(*)FROM `comments` WHERE `comments`.`post_id` = `posts`.`id`) AS comments_count,
        (SELECT `username` FROM `users` WHERE `users`.`user_id` = `posts`.`user_id`) AS username,
        (SELECT `name` FROM `categories` WHERE `categories`.`category_id` = `posts`.`cat_id`) AS category
        FROM `posts` WHERE `cat_id` = ? ORDER BY `created_at` DESC LIMIT 0,6', [$cat_id])->fetchAll();
    }
}
