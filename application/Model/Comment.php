<?php

namespace Application\Model;

class Comment extends Model
{
    protected $tableName = "`comments`";


    public function getCommentsMethod()
    {
        return $this->selectMethod('SELECT `comments`.*, `posts`.`title` AS post_title, `users`.`user_call` AS user_call FROM `comments`
        LEFT JOIN `posts` ON `comments`.`post_id` = `posts`.`id`
        LEFT JOIN `users` ON `comments`.`user_id` = `users`.`id` ORDER BY `id` DESC')->fetchAll();
    }

    public function getUnseenCommentsMethod()
    {
        return $this->selectMethod('SELECT * FROM `comments` WHERE `status` = ?', ['unseen'])->fetchAll();
    }

    public function changeStatusMethod($id)
    {
        $comment = $this->findMethod($id);

        if ($comment['status'] == 'seen')
            $this->updateMethod('comments', $id, ['status'], ['approved']);
        else
            $this->updateMethod('comments', $id, ['status'], ['seen']);
    }

    public function getCommentMethod($id)
    {
        return $this->selectMethod('SELECT `comments`.*, (SELECT `title` FROM `posts` WHERE `comments`.`post_id` = `posts`.`id`)AS post_titles , 
        (SELECT `user_call` FROM `users` WHERE `comments`.`user_id` = `users`.`id`)AS user_call, 
        (SELECT `username` FROM  `users` WHERE `comments`.`user_id` = `users`.`id`) AS username 
        FROM `comments` WHERE `id` = ?', [$id])->fetch();
    }
}