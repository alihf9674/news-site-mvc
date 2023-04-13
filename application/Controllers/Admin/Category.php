<?php

namespace Application\Controllers\admin;

use Application\Model\Category as CategoryModel;
use Application\Controllers\controller;

class Category extends Controller
{
    public function index()
    {
        $categories = CategoryModel::all();
        return $this->view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return $this->view('admin.categories.create');
    }

    public function store($data)
    {

        if(empty($data['name'])){

            flash('error','you must provide');
            $this->redirect('admin/category');
        }
        CategoryModel::insert('categories', array_keys($data), $data);
        $this->redirect('admin/category');
    }

    public function edit($id)
    {
        $category = CategoryModel::find($id);
        $this->view('admin.categories.edit', compact('category'));
    }

    public function update($request, $id)
    {
        CategoryModel::update('categories', $id, array_keys($request), $request);
        return $this->redirect('admin/category');
    }

    public function delete($id)
    {
        CategoryModel::delete('categories', $id);
        return $this->back();
    }
}
