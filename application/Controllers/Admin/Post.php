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

    private array $formInput = ['username', 'user_email', 'password', 'permission'];
    private array $skipValidation = ['user_email'];

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
        if (empty($data)) {
            flash('error', 'فیلد ها نباید خالی باشد؛ مجددا تلاش کنید.');
            $this->back();
            die;
        }
        if (!isValidInput($data, $this->formInput)) {
            flash('error', 'لطفا همه فیلد ها را به طورصحیح پر کنید.');
            $this->back();
            die;
        }
        date_default_timezone_set('Iran');
        $PublishedAtTimeStamp = $this->timeFilter($data['published_at']);
        if ($data['cat_id'] == null) {
            flash('error', 'لطفا دسته بندی مورد نظر را وارد کنید.');
            $this->back();
            die;
        }
        if (!$this->imageTypeFilter($data['image'])) {
            flash('error', 'فرمت های مجاز برای آپلود شامل این موارد میباشد : gif ,webp ,jpeg ,png, jpg');
            $this->back();
            die;
        }
        if (!$this->timeCheck($data['published_at'])) {
            flash('error', 'تاریخ باید بزرگتر از تاریخ فعلی باشد.');
            $this->back();
            die;
        }
        $data['published_at'] = date("Y-m-d H:i:s", (int)$PublishedAtTimeStamp);
        $data['image'] = (new SavePost)->save($data['image']);
        if (!$data['image']) {
            flash('error', 'عملیات آپلود عکس ناموفق بود؛ لطفا مجددا تلاش کنید.');
            $this->back();
            die;
        }
        $data = array_merge($data, ['user_id' => 1]);
        PostModel::insert('posts', array_keys($data), array_values($data));
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
        if (empty($data)) {
            flash('error', 'فیلد ها نباید خالی باشد؛ مجددا تلاش کنید.');
            $this->back();
            die;
        }
        date_default_timezone_set('Iran');
        $PublishedAtTimeStamp = $this->timeFilter($data['published_at']);
        if ($data['cat_id'] == null) {
            flash('error', 'فیلد ها نباید خالی باشد؛ مجددا تلاش کنید.');
            $this->back();
            die;
        }
        if (!$this->imageTypeFilter($data['image'])) {
            flash('error', 'فرمت های مجاز برای آپلود شامل این موارد میباشد : gif ,webp ,jpeg ,png, jpg');
            $this->back();
            die;
        }
        if (!$this->timeCheck($data['published_at'])) {
            flash('error', 'تاریخ باید بزرگتر از تاریخ فعلی باشد.');
            $this->back();
            die;
        }
        $data['published_at'] = date("Y-m-d H:i:s", (int)$PublishedAtTimeStamp);
        (new SavePost)->unset(PostModel::find($id));
        $data['image'] = (new SavePost)->save($data['image']);
        if (!$data['image']) {
            flash('error', 'عملیات آپلود عکس ناموفق بود؛ لطفا مجددا تلاش کنید.');
            $this->back();
            die;
        }
        $data = array_merge($data, ['user_id' => 1]);
        PostModel::update('posts', $id, array_keys($data), array_values($data));
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
