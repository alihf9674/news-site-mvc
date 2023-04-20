<?php

namespace Application\Controllers\admin;

use Application\Model\Menu as MenuModel;
use Application\Controllers\controller;

class Menu extends Controller
{
    private array $formInput = ['name', 'url', 'parent_id'];
    private array $skipValidation = ['url'];

    public function index()
    {
        $menus = MenuModel::getParentNameMenu();
        return $this->view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        $parentMenus = MenuModel::getParentMenus();
        return $this->view('admin.menus.create', compact('parentMenus'));
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
        if (!filter_var($data['url'], FILTER_VALIDATE_URL)) {
            flash('error', 'لطفا فرمت آدرس را به طور صحیح وارد کنید.');
            $this->back();
            die;
        }
        $safeData = validateFormData($data, $this->skipValidation);
        MenuModel::insert('menus', array_keys(array_filter($safeData)), array_values(array_filter($safeData)));
        $this->redirect('admin/menu');
    }

    public function edit($id)
    {
        $menus = MenuModel::getParentMenus();
        $menu = MenuModel::find($id);
        return $this->view('admin/menus/edit', compact('menus', 'menu'));
    }

    public function update($data, $id)
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
        if (!filter_var($data['url'], FILTER_VALIDATE_URL)) {
            flash('error', 'لطفا فرمت آدرس را به طور صحیح وارد کنید.');
            $this->back();
            die;
        }
        $safeData = validateFormData($data, $this->skipValidation);
        MenuModel::update('menus', $id, array_keys($safeData), array_values($safeData));
        $this->redirect('admin/menu');
    }

    public function delete($id)
    {
        MenuModel::delete('menus', $id);
        $this->back();
    }
}