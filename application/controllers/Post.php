<?php

namespace Application\Controllers;

use Application\Model\Post as PostModel;
use Application\Model\category as CategoryModel;
use System\Traits\HasPostController;
use System\Traits\HasImage;

class Post extends Controller
{
      use HasPostController, HasImage;

      public function index()
      {
            $postsModel = new PostModel();
            $posts = $postsModel->getPostsInfo();
            return $this->view('admin.posts.index', compact('posts'));
      }

      public function create()
      {
            $postModel = new PostModel();
            $categoryModel = new CategoryModel();
            $categories = $categoryModel->all();
            return $this->view('admin.posts.create', compact('categories'));
      }

      public function store($data)
      {
            date_default_timezone_set('Iran');
            $PublishedAtTimeStamp = $this->timeFilter($data['published_at']);
            if ($data['cat_id'] != null) {
                  if ($this->imageTypeFilter($data['image']) && $this->timeCheck($data['published_at'])){
                        $data['published_at'] = date("Y-m-d H:i:s", (int)$PublishedAtTimeStamp);
                        $data['image'] = $this->SaveImage($data['image']);
                        if ($data['image']) {

                              $data = array_merge($data, ['user_id' => 1]);
                              $postModel = new PostModel();
                              $postModel->insert('posts', array_keys($data), array_values($data));

                              $this->redirect('admin/post');
                        }
                  }
            }
            $this->redirect('admin/post');
      }

      public function edit($id)
      {
            $postModel = new PostModel();
            $categoryModel = new CategoryModel();
            $categories = $categoryModel->all();
            $post = $postModel->find($id);
            return $this->view('admin.posts.edit', compact('post', 'categories'));
      }

      public function update($data, $id)
      {
            date_default_timezone_set('Iran');
            $PublishedAtTimeStamp = $this->timeFilter($data['published_at']);

            if ($data['cat_id'] != null) {
                  if ($this->imageTypeFilter($data['image']) && $this->timeCheck($data['published_at'])) {
                        $data['published_at'] = date("Y-m-d H:i:s", (int)$PublishedAtTimeStamp);
                        $data['image'] = $this->SaveImage($data['image']);
                        if ($data['image']) {
                              $data = array_merge($data, ['user_id' => 1]);
                              $postModel = new PostModel();
                              $postModel->update('posts', $id, array_keys($data), array_values($data));
                              $this->redirect('admin/post');
                        }
                  }
            }
            $this->redirect('admin/post');
      }

      public function delete($id)
      {
            $postModel = new PostModel();
            $post = $postModel->find($id);
            $this->removeImage($post['image']);
            $postModel->delete('posts', $id);
            $this->back();
      }

      public function selected($id)
      {
            $postModel = new PostModel();
            $selectedPost = $postModel->find($id);

            if (!empty($selectedPost)) {
                  if ($selectedPost['selected'] == 1)
                        $postModel->update('posts', $id, ['selected'], [2]);
                  else
                        $postModel->update('posts', $id, ['selected'], [1]);
            }
            $this->back();
      }

      public function breakingNews($id)
      {
            $postModel = new PostModel();
            $breakingNews = $postModel->find($id);

            if (!empty($breakingNews)) {
                  if ($breakingNews['breaking_news'] == 1)
                        $postModel->update('posts', $id, ['breaking_news'], [2]);
                  else
                        $postModel->update('posts', $id, ['breaking_news'], [1]);
            }
            $this->back();
      }
}
