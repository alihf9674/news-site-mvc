<?php

namespace Application\Controllers\admin;

use Application\Model\Setting as SettingModel;
use Application\Controllers\controller;
use System\Services\Image\SettingImageService as SettingImage;

class Setting extends Controller
{
    public function index()
    {
        $setting = SettingModel::all();
        $this->view('admin.websetting.index', compact('setting'));
    }

    public function edit()
    {
        $setting = SettingModel::all();
        $this->view('admin.websetting.edit', compact('setting'));
    }

    public function Update($data)
    {
        if (empty($data))
            $this->redirect('admin/setting');
        $setting = SettingModel::all();
        if (!empty($data['logo']['tmp_name']))
            (new SettingImage)->save($data['icon']);
        unset($data['logo']);
        if (!empty($data['icon']['tmp_name']))
            (new SettingImage)->save($data['icon']);
        unset($data['icon']);
        if (empty($data))
            SettingModel::update('websetting', $data['id'], array_keys($data), array_values($data));
        SettingModel::insert('websetting', array_keys($data), array_values($data));
        $this->redirect('admin/setting');
    }
}