<?php

namespace Application\Controllers\admin;

use Application\Model\Category as CategoryModel;
use Application\Controllers\controller;

class Category extends Controller
{
    private array $formInput = ['name'];

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
        if (empty($data['name']))
            $this->setWarningFlashMessage('فیلد ها نباید خالی باشد؛ مجددا تلاش کنید.');
        if (!isValidInput($data, $this->formInput))
            $this->setWarningFlashMessage('لطفا فیلد درست را وارد کنید.');
        $safeData = validateFormData($data);
        CategoryModel::insert('categories', array_keys($safeData), array_values($safeData));
        $this->redirect('admin/category');
    }

    public function edit($id)
    {
        $category = CategoryModel::find($id);
        $this->view('admin.categories.edit', compact('category'));
    }

    public function update($data, $id)
    {
        if (empty($data['name']))
            $this->setWarningFlashMessage('فیلد ها نباید خالی باشد؛ مجددا تلاش کنید.');
        if (!isValidInput($data, $this->formInput))
            $this->setWarningFlashMessage('لطفا فیلد درست را وارد کنید.');
        $safeData = validateFormData($data);
        CategoryModel::update('categories', $id, array_keys($safeData), array_values($safeData));
        return $this->redirect('admin/category');
    }

    public function delete($id)
    {
        CategoryModel::delete('categories', $id);
        return $this->back();
    }
}
