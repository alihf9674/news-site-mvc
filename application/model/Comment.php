<?php

namespace Application\Model;

class Comment extends Model
{
    public $tableName = "`comments`";

    public function getComments()
    {
        return $this->select('SELECT `comments`.*, `posts`.`title` AS post_title, `users`.`user_call` AS user_call FROM `comments`
        LEFT JOIN `posts` ON `comments`.`post_id` = `posts`.`id`
        LEFT JOIN `users` ON `comments`.`user_id` = `users`.`id` ORDER BY `id` DESC');
    }

    public function getUnseenComments()
    {
        return $this->select('SELECT * FROM `comments` WHERE `status` = ?', ['unseen']);
    }

    public function changeStatus($id)
    {
        $comments = $this->find($id);
        if ($comments['status'] == 'seen')
            $this->update('comments', $id, ['status'], ['approved']);
        else
            $this->update('comments', $id, ['status'], 'seen');
    }
}