<?php

namespace Application\Controllers\admin;

use Application\Model\Banner as BannerModel;
use Application\Controllers\controller;
use System\Services\image\BannerImageService as ّImageService;
use System\Traits\HasPostController;

class Banner extends Controller
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
            flash('error', 'لطفافرمت آدرس را صحیح وارد کنید.');
            $this->back();
            die;
        }
        if ($this->imageTypeFilter($data['image'])) {
            flash('error', 'فرمت های مجاز برای آپلود شامل این موارد میباشد : gif ,webp ,jpeg ,png, jpg');
            $this->back();
            die;
        }
        $data['image'] = (new ّImageService)->save($data['image']);
        if (!$data['image']) {
            flash('error', 'عملیات آپلود عکس ناموفق بود؛ لطفا مجددا تلاش کنید.');
            $this->back();
            die;
        }
        BannerModel::insert('banners', array_keys($data), array_values($data));
        $this->redirect('admin/banner');
    }

    public function edit($id)
    {
        $banner = BannerModel::find($id);
        return $this->view('admin.banners.edit', compact('banner'));
    }

    public function update($id, $data)
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
            flash('error', 'لطفافرمت آدرس را صحیح وارد کنید.');
            $this->back();
            die;
        }
        if ($this->imageTypeFilter($data['image'])) {
            flash('error', 'فرمت های مجاز برای آپلود شامل این موارد میباشد : gif ,webp ,jpeg ,png, jpg');
            $this->back();
            die;
        }
        if (!is_null($data['image']['tmp_name'])) {
            $previousData = BannerModel::find($id);
            (new ّImageService)->unset($previousData['image']);
            $data['image'] = (new ّImageService)->save($data['image']);
        } else {
            unset($data['image']);
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