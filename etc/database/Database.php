<?php
namespace MyApp\database;

use MyConfig\Dev;

/**
*Class for creating the connection to the database.
*/
final class Database extends Dev
{

    public function getConnection()
    {
        $connection = new \PDO(self::DB_HOST, self::DB_USER, self::DB_PASS);
        $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return $connection;
    }
}
