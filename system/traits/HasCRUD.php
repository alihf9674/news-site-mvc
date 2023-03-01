<?php

namespace System\Traits;

use PDOException;

trait HasCRUD
{
      public function select($sql, $values = null)
      {     
            try {
                  $statement = $this->connection->prepare($sql);
                  if (!is_null($values)) {
                      $statement->execute($values);
                  } else {
                      $statement->execute();
                  }
                return $statement;
            } catch (PDOException $e) {
                  echo "Error: " . $e->getMessage();
                  exit;
            }
      }

      public function insert($tableName, $fields, $values)
      {
            try {
                  $statement = $this->connection->prepare("INSERT INTO " . $tableName . " ("
                        . implode(', ', $fields) . ", created_at) VALUES (:" . implode(', :', $fields) . ", NOW());");

                  $a = $statement->execute(array_combine($fields, $values));

                  return true;
            } catch (PDOException $e) {
                  echo "Error: " . $e->getMessage();
                  return false;
            }
      }

      public function update($tableName, $id, $fields, $values)
      {
            $sql = "UPDATE " . $tableName . " SET";

            foreach (array_combine($fields, $values) as $field => $value) {
                  if ($value)
                        $sql .= " `" . $field . "` = ? ,";
                  else
                        $sql .= " `" . $field . "` = NULL ,";
            }
            $sql .= " updated_at = NOW()";
            $sql .= " WHERE id = ?";
            
            try {
                  $statement = $this->connection->prepare($sql);
                  $statement->execute(array_merge(array_filter(array_values($values)), [$id]));
                  return true;
            } catch (PDOException $e) {
                  echo "Error: " . $e->getMessage();
                  return false;
            }
      }

      public function delete($tableName, $id)
      {
            $sql = "DELETE FROM " . $tableName . " WHERE id = ?";
            try {
                  $statement = $this->connection->prepare($sql);
                  $statement->execute(array($id));
                  return true;
            } catch (PDOException $e) {
                  echo "Error: " . $e->getMessage();
                  return false;
            }
      }
}
