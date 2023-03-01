<?php

namespace Application\Model;

class Banner extends Model
{
    public function all()
    {
        $banners = $this->select('SELECT * FROM `banners`')->fetchAll();
        return $banners;
    }

    public function find($id)
    {
        $banner = $this->select('SELECT * FROM `banners` WHERE `id` = ?', [$id])->fetch();
        return $banner;
    }
}