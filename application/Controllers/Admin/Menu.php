<?php

namespace Application\Controllers\admin;

use Application\Model\Menu as MenuModel;
use Application\Controllers\controller;

class Menu extends Controller
{
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
        if (filter_var($data['url'], FILTER_VALIDATE_URL))
            MenuModel::insert('menus', array_keys(array_filter($data)), array_values(array_filter($data)));
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
        if (filter_var($data['url'], FILTER_VALIDATE_URL))
            MenuModel::update('menus', $id, array_keys($data), array_values($data));
        $this->redirect('admin/menu');
    }

    public function delete($id)
    {
        MenuModel::delete('menus', $id);
        $this->back();
    }
}