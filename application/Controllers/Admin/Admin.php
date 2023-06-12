<?php

namespace Application\Controllers\Admin;

use Application\Controllers\Controller;
use Application\Model\Category;
use Application\Model\User;
use Application\Model\Comment;
use Application\Model\Post;
use System\Auth\Auth;

class Admin extends Controller
{
    public function __construct()
    {
        Auth::check();
        if (Auth::user()['permission'] != 'admin') {
            $this->redirect('login');
            exit;
        }
    }

    public function dashboard()
    {
        $categoryCount = Category::getCategoriesCount();
        $userCount = User::getUsersCount();
        $adminCount = User::getAdminsCount();
        $postCount = Post:: getPostsCount();
        $postViews = Post::getPostsView();
        $commentCount = Comment::getCommentsCount();
        $commentUnseenCont = Comment::getUnseenCommentsCount();
        $commentApprovedCount = Comment::getApprovedCommentsCount();
        $mostViewedPosts = Post::getMostViewedPost();
        $postCommentedPosts = Post::getMostCommentedPosts();
        $lastComments = Comment::getLastComments();
        return $this->view('admin.dashboard.index', compact('postCount', 'categoryCount', 'commentCount', 'userCount', 'adminCount', 'postViews', 'commentUnseenCont', 'commentApprovedCount', 'mostViewedPosts', 'postCommentedPosts', 'lastComments'));
    }
}