<?php

namespace Application\Controllers\admin;

use Application\Model\Banner as BannerModel;
use Application\Controllers\controller;
use System\Services\image\BannerImageService as SaveImage;
use System\Traits\HasPostController;

class Banner extends Controller
{
    use HasPostController;

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
        if (filter_var($data['url'], FILTER_VALIDATE_URL) && $this->imageTypeFilter($data['image'])) {

            $data['image'] = (new SaveImage)->save($data['image']);

            if ($data['image']) {
                BannerModel::insert('banners', array_keys($data), array_values($data));
                $this->redirect('admin/banner');
            } else {
                $this->redirect('admin/banner');
            }
        } else {
            $this->redirect('admin/banner');
        }
    }

    public function edit($id)
    {
        $banner = BannerModel::find($id);
        return $this->view('admin.banners.edit', compact('banner'));
    }

    public function update($id, $data)
    {

        if (filter_var($data['url'], FILTER_VALIDATE_URL) && $this->imageTypeFilter($data['image'])) {
            if (!is_null($data['image']['tmp_name'])) {
                $previousData = BannerModel::find($id);
                (new SaveImage)->unset($previousData['image']);
                $data['image'] = (new SaveImage)->save($data['image']);
            } else {
                unset($data['image']);
            }
            BannerModel::update('banners', $id, array_keys($data), array_values($data));
            $this->redirect('admin/banner');
        }
        $this->redirect('admin/banner');
    }

    public function delete($id)
    {
        $banner = BannerModel::find($id);
        (new SaveImage)->unset($banner['image']);
        BannerModel::delete('banners', $id);
        $this->back();
    }
}