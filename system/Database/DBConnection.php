<?php

namespace System\Database;

use PDO;
use PDOException;

class DBConnection
{
    private $connection;
    private $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    );

    public function __construct()
    {
        try {
            $this->connection = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";", DB_USERNAME, DB_PASSWORD, $this->options);

        } catch (PDOException $e) {
            echo "Error: Your connection has same error " . $e->getMessage();
        }
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }
}