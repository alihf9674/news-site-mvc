<?php

namespace Application\Model;

use System\Traits\HasCRUD;
use System\Traits\HasCreateTable;

abstract class Model
{
    use HasCRUD, HasCreateTable;

    public $tableName;
}