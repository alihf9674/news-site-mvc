<?php

namespace Application\Model;

use System\Traits\HasCRUD;
use System\Traits\HasCreateTable;

Abstract Class Model
{
      use HasCRUD, HasCreateTable;

     public $tableName;

}
