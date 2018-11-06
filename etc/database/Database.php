<?php

namespace MyApp\database;
use \PDO;
use MyApp\Config;

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
        
		return new \PDO('mysql:host=localhost;dbname=profesionnal_blog;charset=utf8', 
            'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }
}
