<?php

// connection database


require ('../../config/pdo.php');

function pdo()
{


	$db = new PDO('mysql:host=$host;dbname=$dbname;charset=$charset', '$login', '$password');
	return $db;

}