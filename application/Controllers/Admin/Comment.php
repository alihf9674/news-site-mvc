<?php

namespace Application\Controllers\admin;

use Application\Model\Comment as CommentModel;
use Application\Controllers\controller;

class Comment extends Controller
{
    public function index()
    {
        $comments = CommentModel::getComments();
        $unseenComments = CommentModel::getUnseenComments();
        foreach ($unseenComments as $unseenComment) {
            CommentModel::update('comments', $unseenComment['id'], ['status'], ['seen']);
        }
        return $this->view('admin.comments.index', compact('comments'));
    }

    public function show($id)
    {
        $comment = CommentModel::getComment($id);
        return $this->view('admin.comments.show', compact('comment'));
    }

    public function changeStatus($id)
    {
        CommentModel::changeStatus($id);
        $this->back();
    }
}