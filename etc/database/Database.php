<?php
namespace MyApp\database;

/**
*Class for creating the connection to the database.
*/
final class Database
{

    public function getConnection()
    {
        $connection = new \PDO(DB_HOST, DB_USER, DB_PASS);
        $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return $connection;
    }
}
