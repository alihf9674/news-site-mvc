<?php

namespace Application\Controllers;

use Application\Model\Banner as BannerModel;
use System\Services\image\BannerImageService as SaveImage;
use System\Traits\HasPostController;

class Banner extends Controller
{
    use HasPostController;

    public function index()
    {
        $bannerModel = new BannerModel();
        $banners = $bannerModel->all();
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

                $bannerModel = new BannerModel();
                $bannerModel->insert('banners', array_keys($data), array_values($data));
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
        $bannerModel = new BannerModel();
        $banner = $bannerModel->find($id);
        return $this->view('admin.banners.edit', compact('banner'));
    }

    public function update($id, $data)
    {
        $bannerModel = new BannerModel();
        if (filter_var($data['url'], FILTER_VALIDATE_URL) && $this->imageTypeFilter($data['image'])) {
            if (!is_null($data['image']['tmp_name'])) {
                $previousData = $bannerModel->find($id);
                (new SaveImage)->unset($previousData['image']);
                $data['image'] = (new SaveImage)->save($data['image']);
            } else {
                unset($data['image']);
            }
            $bannerModel->update('banners', $id, array_keys($data), array_values($data));
            $this->redirect('admin/banner');
        }
        $this->redirect('admin/banner');
    }

    public function delete($id)
    {
        $bannerModel = new BannerModel();
        $banner = $bannerModel->find($id);
        (new SaveImage)->unset($banner['image']);
        $bannerModel->delete('banners', $id);
        $this->back();
    }
}