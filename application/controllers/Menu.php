<?php

namespace Application\Controllers;

use Application\Model\Menu as MenuModel;

class Menu extends Controller
{
    public function index()
    {
        $menus = (new MenuModel())->getParentNameMenu();
        return $this->view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        $parentMenus = (new MenuModel())->getParentMenus();
        return $this->view('admin.menus.create', compact('parentMenus'));
    }

    public function store($data)
    {
        if (filter_var($data, FILTER_VALIDATE_URL))
            (new MenuModel())->insert('menus', array_keys(array_filter($data)), array_values(array_filter($data)));
        $this->redirect('admin/menu');
    }

    public function edit($id)
    {
        $menuModel = new MenuModel();
        $menus = $menuModel->getParentMenus();
        $menu = $menuModel->find($id);
        return $this->view('admin/menus/edit', compact('menus', 'menu'));
    }

    public function update($data, $id)
    {
        if (filter_var($data, FILTER_VALIDATE_URL))
            (new MenuModel())->update('menus', $id, array_keys($data), array_values($data));
        $this->redirect('admin/menu');
    }

    public function delete($id)
    {
        (new MenuModel())->delete('menus', $id);
        $this->back();
    }
}