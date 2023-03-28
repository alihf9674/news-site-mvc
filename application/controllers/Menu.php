<?php

namespace Application\Controllers;
use Application\Model\Menu AS MenuModel;

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
        (new MenuModel())->insert('menus',array_keys(array_filter($data)), array_values(array_filter($data)));
        $this->redirect('admin/menu');
    }

    public function edit($id)
    {

    }

    public function update($id)
    {

    }

    public function delete($id)
    {
    }
}