<?php

namespace Application\Model;

class Setting extends Model
{
    public $tableName = 'websetting';

    public function getAndSortSettings()
    {
        return $this->select('SELECT * FROM `websetting` ORDER BY `id` DESC ');
    }
}