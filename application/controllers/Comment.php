<?php

namespace Application\Controllers;

use Application\Model\Comment as CommentModel;

class Comment extends Controller
{
    public function index()
    {
        $commentsModel = new CommentModel();
        $comments = $commentsModel->getComments();
        $unseenComments = $commentsModel->getUnseenComments();
        foreach ($unseenComments as $unseenComment) {
            $commentsModel->update('comments', $unseenComment['id'], ['status'], ['seen']);
        }
        return $this->view('admin.comments.index', compact('comments'));
    }

    public function show($id)
    {
        $comment = (new CommentModel())->getComment($id);
        return $this->view('admin.comments.show', compact('comment'));
    }

    public function changeStatus($id)
    {
        $commentModel = new CommentModel();
        $commentModel->changeStatus($id);
        $this->back();
    }
}