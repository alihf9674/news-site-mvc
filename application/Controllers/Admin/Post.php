<?php

namespace Application\Controllers\admin;

use Application\Model\Post as PostModel;
use Application\Model\category as CategoryModel;
use Application\Controllers\controller;
use System\Traits\HasPostController;
use System\Services\image\PostImageService as SavePost;

class Post extends Controller
{
    use HasPostController;

    public function index()
    {
        $posts = PostModel::getPostsInfo();
        return $this->view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = CategoryModel::all();
        return $this->view('admin.posts.create', compact('categories'));
    }

    public function store($data)
    {
        date_default_timezone_set('Iran');
        $PublishedAtTimeStamp = $this->timeFilter($data['published_at']);
        if ($data['cat_id'] != null) {
            if ($this->imageTypeFilter($data['image']) && $this->timeCheck($data['published_at'])) {
                $data['published_at'] = date("Y-m-d H:i:s", (int)$PublishedAtTimeStamp);
                $data['image'] = (new SavePost)->save($data['image']);
                if ($data['image']) {
                    $data = array_merge($data, ['user_id' => 1]);
                    PostModel::insert('posts', array_keys($data), array_values($data));
                    $this->redirect('admin/post');
                }
            }
        }
        $this->redirect('admin/post');
    }

    public function edit($id)
    {
        $categories = CategoryModel::all();
        $post = PostModel::find($id);
        return $this->view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update($data, $id)
    {
        date_default_timezone_set('Iran');
        $PublishedAtTimeStamp = $this->timeFilter($data['published_at']);

        if ($data['cat_id'] != null) {
            if ($this->imageTypeFilter($data['image']) && $this->timeCheck($data['published_at'])) {
                $data['published_at'] = date("Y-m-d H:i:s", (int)$PublishedAtTimeStamp);
                (new SavePost)->unset(PostModel::find($id));
                $data['image'] = (new SavePost)->save($data['image']);
                if ($data['image']) {
                    $data = array_merge($data, ['user_id' => 1]);
                    PostModel::update('posts', $id, array_keys($data), array_values($data));
                    $this->redirect('admin/post');
                }
            }
        }
        $this->redirect('admin/post');
    }

    public function delete($id)
    {
        $post = PostModel::find($id);
        (new SavePost)->unset($post['image']);
        PostModel::delete('posts', $id);
        $this->back();
    }

    public function selected($id)
    {
        $selectedPost = PostModel::find($id);

        if (!empty($selectedPost)) {
            if ($selectedPost['selected'] == 1)
                PostModel::update('posts', $id, ['selected'], [2]);
            else
                PostModel::update('posts', $id, ['selected'], [1]);
        }
        $this->back();
    }

    public function breakingNews($id)
    {
        $breakingNews = PostModel::find($id);

        if (!empty($breakingNews)) {
            if ($breakingNews['breaking_news'] == 1)
                PostModel::update('posts', $id, ['breaking_news'], [2]);
            else
                PostModel::update('posts', $id, ['breaking_news'], [1]);
        }
        $this->back();
    }
}
