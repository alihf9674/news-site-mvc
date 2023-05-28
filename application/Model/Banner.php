<?php

namespace Application\Model;

class Banner extends Model
{
    protected $tableName = "`banners`";

    public function getLastBannerMethod()
    {
        return $this->selectMethod('SELECT * FROM `banners` LIMIT 0,1')->fetch();
    }
}