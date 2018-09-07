<?php

require_once __DIR__.'/../Config.php';

final class Database
{
    private $config;

    public function __construct()
    {
        $this->config = new Config();
    }

    public function getPDO()
    {
        $this->config->loadConfigFromFile('pdo.php');

        $host = $this->config->get('host');
        $dbname = $this->config->get('dbname');
        $charset = $this->config->get('charset');
        $username = $this->config->get('username');
        $password = $this->config->get('password');

		return new \PDO('mysql:host='.$host. ';dbname=' .$dbname. ';charset=' .$charset , $username, $password, [PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION]);
    }
}
