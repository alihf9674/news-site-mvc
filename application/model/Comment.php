<?php

namespace Application\Model;

class Comment extends Model
{
    public $tableName = "`comments`";

    public function getComments()
    {
        return $this->select('SELECT `comments`.*, `posts`.`title` AS post_title, `users`.`user_call` AS user_call FROM `comments`
        LEFT JOIN `posts` ON `comments`.`post_id` = `posts`.`id`
        LEFT JOIN `users` ON `comments`.`user_id` = `users`.`id` ORDER BY `id` DESC')->fetchAll();
    }

    public function getUnseenComments()
    {
        return $this->select('SELECT * FROM `comments` WHERE `status` = ?', ['unseen'])->fetchAll();
    }

    public function changeStatus($id)
    {
        $comment = $this->find($id);

        if ($comment['status'] == 'seen')
            $this->update('comments', $id, ['status'], ['approved']);
        else
            $this->update('comments', $id, ['status'], ['seen']);
    }

    public function getComment($id)
    {
        return $this->select('SELECT `comments`.*, (SELECT `title` FROM `posts` WHERE `comments`.`post_id` = `posts`.`id`)AS post_titles , 
        (SELECT `user_call` FROM `users` WHERE `comments`.`user_id` = `users`.`id`)AS user_call, 
        (SELECT `username` FROM  `users` WHERE `comments`.`user_id` = `users`.`id`) AS username 
        FROM `comments` WHERE `id` = ?', [$id])->fetch();
    }
}