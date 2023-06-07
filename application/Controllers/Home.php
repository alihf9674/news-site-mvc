<?php

namespace Application\Controllers;

use Application\Model\Banner;
use Application\Model\Category;
use Application\Model\Comment;
use Application\Model\Menu;
use Application\Model\Post;
use Application\Model\Setting;

class Home extends Controller
{
    public function index()
    {
        $setting = Setting::all();
        $menus = Menu::getParentMenus();
        $topSelectedPosts = Post::getTopSelectedPosts();
        $breakingNews = Post::getBreakingNews();
        $lastPosts = Post::getLastPosts();
        $banner = Banner::getLastBanner();
        $popularPosts = Post::getPupolarPosts();
        $mostCommentPosts = Post::getMostCommentedPosts();
        $this->view('app.index', compact('setting', 'menus', 'topSelectedPosts', 'breakingNews', 'lastPosts', 'mostCommentPosts', 'banner', 'popularPosts'));
    }

    public function show($id)
    {
        $setting = Setting::all();
        $menus = Menu::getParentMenus();
        $banner = Banner::getLastBanner();
        $mostCommentPosts = Post::getMostCommentedPosts();
        $topSelectedPosts = Post::getTopSelectedPosts();
        $comments = Comment::getApprovedComments();
        $post = Post::findDetailsPost($id);
        $this->view('app.show', compact('topSelectedPosts', 'setting', 'menus', 'banner', 'mostCommentPosts', 'comments', 'post'));
    }

    public function category($id)
    {
        $setting = Setting::all();
        $menus = Menu::getParentMenus();
        $banner = Banner::getLastBanner();
        $topSelectedPosts = Post::getTopSelectedPosts();
        $breakingNews = Post::getBreakingNews();
        $popularPosts = Post::getPupolarPosts();
        $mostCommentPosts = Post::getMostCommentedPosts();
        $category = Category::find($id);
        $categoryPosts = Post::getCategoryPosts($id);
        $this->view('app.category', compact('setting', 'category', 'popularPosts', 'breakingNews', 'banner', 'setting', 'mostCommentPosts', 'menus', 'topSelectedPosts', 'categoryPosts'));
    }

    public function storeComment()
    {

    }
}