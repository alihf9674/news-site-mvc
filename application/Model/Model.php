<?php

namespace Application\Model;

use System\Traits\HasCRUD;
use System\Traits\HasCreateTable;
use System\Traits\HastMethodCaller;

abstract class Model
{
    use HasCRUD, HasCreateTable,HastMethodCaller;

    protected $tableName;
}