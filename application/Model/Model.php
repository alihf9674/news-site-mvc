<?php

namespace Application\Model;

use System\Traits\HasCRUD;
use System\Traits\HasCreateTable;
use System\Traits\HasMethodCaller;

abstract class Model
{
    use HasCRUD, HasCreateTable,HasMethodCaller;

    protected $tableName;
}