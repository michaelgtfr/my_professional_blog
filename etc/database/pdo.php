<?php

// connection database



function pdo()
{
	$config = require __DIR__ . '../..config/pdo.php';


	return new PDO('mysql:host='. $config['host']. ';dbname='. $config['dbname'] . ';charset='. $config['charset'] .','. $config['username'] .','. $config['password'] .);

}