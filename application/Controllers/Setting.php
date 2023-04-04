<?php

namespace Application\Controllers;

use Application\Model\Setting as SettingModel;
use System\Services\Image\SettingImageService as SettingImage;

class Setting extends Controller
{
    public function index()
    {
        $setting = (new SettingModel())->all();
        $this->view('admin.websetting.index', compact('setting'));
    }

    public function edit()
    {
        $setting = (new SettingModel())->all();
        $this->view('admin.websetting.edit', compact('setting'));
    }

    public function Update($data)
    {
        if(empty($data))
            $this->redirect('admin/setting');
        $settingModel = new SettingModel();
        $setting = $settingModel->all();
        if (!empty($data['logo']['tmp_name']))
            (new SettingImage)->save($data['icon']);
        unset($data['logo']);
        if (!empty($data['icon']['tmp_name']))
            (new SettingImage)->save($data['icon']);
        unset($data['icon']);
        if (empty($data))
            $settingModel->update('websetting', $data['id'], array_keys($data), array_values($data));
        $settingModel->insert('websetting', array_keys($data), array_values($data));
        $this->redirect('admin/setting');
    }
}