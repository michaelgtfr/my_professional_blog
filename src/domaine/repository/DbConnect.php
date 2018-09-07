<?php

require __DIR__.'/../../../etc/database/Database.php';

class DbConnect
{
	protected $db;

	public function __construct()
	{
        $req = new Database;
        $this->db = $req->getPDO(); 
	}
}