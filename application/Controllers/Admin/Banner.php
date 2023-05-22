<?php

namespace Application\Controllers\Admin;

use Application\Model\Banner as BannerModel;
use System\Services\image\BannerImageService as ّImageService;
use System\Traits\HasPostController;

class Banner extends Admin
{
    use HasPostController;

    private array $formInput = ['url', 'image'];

    public function index()
    {
        $banners = BannerModel::all();
        return $this->view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return $this->view('admin.banners.create');
    }

    public function store($data)
    {
        if (empty($data))
            $this->setWarningFlashMessage('فیلد ها نباید خالی باشد؛ مجددا تلاش کنید.');
        if (!isValidInput($data, $this->formInput))
            $this->setWarningFlashMessage('لطفا همه فیلد ها را به طورصحیح پر کنید.');
        if (!filter_var($data['url'], FILTER_VALIDATE_URL))
            $this->setWarningFlashMessage('لطفافرمت آدرس را صحیح وارد کنید.');
        if (!$this->imageTypeFilter($data['image']))
            $this->setWarningFlashMessage('فرمت های مجاز برای آپلود شامل این موارد میباشد : gif ,webp ,jpeg ,png, jpg');
        $data['image'] = (new ّImageService)->save($data['image']);
        if (!$data['image'])
            $this->setWarningFlashMessage('عملیات آپلود عکس ناموفق بود؛ لطفا مجددا تلاش کنید.');
        BannerModel::insert('banners', array_keys($data), array_values($data));
        $this->redirect('admin/banner');
    }

    public function edit($id)
    {
        $banner = BannerModel::find($id);
        return $this->view('admin.banners.edit', compact('banner'));
    }

    public function update($data, $id)
    {
        if (empty($data))
            $this->setWarningFlashMessage('فیلد ها نباید خالی باشد؛ مجددا تلاش کنید.');
        if (!isValidInput($data, $this->formInput))
            $this->setWarningFlashMessage('لطفا همه فیلد ها را به طورصحیح پر کنید.');
        if (!filter_var($data['url'], FILTER_VALIDATE_URL))
            $this->setWarningFlashMessage('لطفافرمت آدرس را صحیح وارد کنید.');
        if (!$this->imageTypeFilter($data['image']))
            $this->setWarningFlashMessage('فرمت های مجاز برای آپلود شامل این موارد میباشد : gif ,webp ,jpeg ,png, jpg');
        if (!empty($data['image']['tmp_name'])) {
            (new ّImageService)->unset(BannerModel::find($id)['image']);
            $data['image'] = (new ّImageService)->save($data['image']);
        }
        BannerModel::update('banners', $id, array_keys($data), array_values($data));
        $this->redirect('admin/banner');
    }

    public function delete($id)
    {
        $banner = BannerModel::find($id);
        (new ّImageService)->unset($banner['image']);
        BannerModel::delete('banners', $id);
        $this->back();
    }
}