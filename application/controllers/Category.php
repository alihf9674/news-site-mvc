<?php

namespace Application\Controllers;

use Application\Model\Category as CategoryModel;

class Category extends Controller
{
      public function index()
      {

            $categoriesModel = new CategoryModel();

            $categories = $categoriesModel->all();


            return $this->view('admin.categories.index', compact('categories'));
      }

      public function create()
      {
            return $this->view('admin.categories.create');
      }

      public function store($data)
      {
            $categoryModel = new CategoryModel();
            $categoryModel->insert('categories', array_keys($data), $data);
            $this->redirect('admin/category');
      }

      public function edit($id)
      {
            $categoryModel = new CategoryModel();
            $category = $categoryModel->find($id);
            $this->view('admin.categories.edit', compact('category'));
      }

      public function update($request, $id)
      { 
            $categoryModel = new CategoryModel();
            $categoryModel->update('categories', $id, array_keys($request), $request);
            return $this->redirect('admin/category');
      }

      public function delete($id)
      {
            $categoryModel = new CategoryModel();
            $categoryModel->delete('categories', $id);
            return $this->back();
      }
}
