<?php

namespace Application\Controllers\admin;

use Application\Model\Setting as SettingModel;
use Application\Controllers\controller;
use System\Services\Image\SettingImageService as SettingImage;

class Setting extends Controller
{
    private array $formInput = ['title', 'description', 'keywords', 'logo', 'icon'];
    private array $skipValidation = ['logo', 'icon'];

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
        if (!isValidInput($data, $this->formInput)) {
            flash('error', 'لطفا همه فیلد ها را به طورصحیح پر کنید.');
            $this->back();
            die;
        }
        $setting = SettingModel::all();
        if (!empty($data['logo']['tmp_name']))
            (new SettingImage)->save($data['icon']);
        unset($data['logo']);
        if (!empty($data['icon']['tmp_name']))
            (new SettingImage)->save($data['icon']);
        unset($data['icon']);
        $safeData = validateFormData($data, $this->skipValidation);
        if (empty($data))
            SettingModel::update('websetting', $setting['id'], array_keys($safeData), array_values($safeData));
        SettingModel::insert('websetting', array_keys($safeData), array_values($safeData));
        $this->redirect('admin/setting');
    }
}