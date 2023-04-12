<?php

namespace System\Traits;

use PDOException;
use System\Database\DBConnection;

trait HasCRUD
{
    protected function selectMethod($sql, $values = null)
    {
        try {
            $statement = (new DBConnection)->connection->prepare($sql);
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

    protected function insertMethod($tableName, $fields, $values)
    {
        try {
            $statement = (new DBConnection)->connection->prepare("INSERT INTO " . $tableName . " ("
                . implode(', ', $fields) . ", created_at) VALUES (:" . implode(', :', $fields) . ", NOW());");

            $statement->execute(array_combine($fields, $values));

            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    protected function updateMethod($tableName, $id, $fields, $values)
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
            $statement = (new DBConnection)->connection->prepare($sql);
            $statement->execute(array_merge(array_filter(array_values($values)), [$id]));
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    protected function deleteMethod($tableName, $id)
    {
        $sql = "DELETE FROM " . $tableName . " WHERE id = ?";
        try {
            $statement = (new DBConnection)->connection->prepare($sql);
            $statement->execute(array($id));
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    protected function allMethod()
    {
        return $this->selectMethod('SELECT * FROM ' . "$this->tableName");
    }

    protected function findMethod($id)
    {
        return $this->selectMethod('SELECT * FROM ' . "$this->tableName" . 'WHERE id =?', [$id])->fetch();
    }
}
