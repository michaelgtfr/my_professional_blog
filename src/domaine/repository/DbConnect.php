<?php

namespace MyModule\domaine\repository;
use MyApp\database\Database;

class DBConnect
{
	protected $db;

	public function __construct()
	{
		if ($this->db == null) {
        $this->db = (new Database)->getPDO();
        }
	}
}