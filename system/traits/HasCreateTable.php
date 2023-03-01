<?php

namespace System\Traits;

use PDOException;

trait HasCreateTable
{
      public function createTable($sql)
      {
            try {
                  $this->connection->exec($sql);
                  return true;
            } catch (PDOException $e) {
                  echo "Error creating table: " . $e->getMessage();
                  return false;
            }
      }
}
