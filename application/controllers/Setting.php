<?php

namespace Application\Controllers;

use Application\Model\Setting as SettingModel;

class Setting extends Controller
{
    public function index()
    {
        $settings = (new SettingModel())->getAndSortSettings();
        $this->view('admin.websetting.index', compact('settings'));
    }

    public function edit($id)
    {
        $settings = (new SettingModel())->getAndSortSettings();
        $this->view('admin.websetting.edit', compact('settings'));
    }

    public function Update($data, $id)
    {
    }
}