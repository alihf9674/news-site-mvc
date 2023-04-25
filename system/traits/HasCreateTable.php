<?php

namespace System\Traits;

use PDOException;
use System\Database\DBConnection;
trait HasCreateTable
{
      public function createTable($sql)
      {
            try {
                (new DBConnection)->getConnection()->exec($sql);
                  return true;
            } catch (PDOException $e) {
                  echo "Error creating table: " . $e->getMessage();
                  return false;
            }
      }
}
