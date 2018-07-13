<?php

// connection database



function pdo()
{
	$config = require __DIR__ . '../../../config/pdo.php';

	if(isset($config)){

		return new PDO('mysql:host='.$config['host']. ';dbname='.$config['dbname']. ';charset='.$config['charset'] , $config['username'] ,  $config['password']);

	} else {
		throw new Exception('configuration at the database not recovered');  
	}
}