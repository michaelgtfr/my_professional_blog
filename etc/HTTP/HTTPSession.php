<?php

namespace MyApp\HTTP;

/**
*Class permettant la création d'une session et la récupération des éléments SESSION .
*/
class HTTPSession
{
	public function __construct()
	{
		session_start();
	}

	public function add($key, $value)
	{
		$_SESSION[$key] = $value;
	}

	public function get($key, $value = null)
	{
		return $_SESSION[$key] ?? $value;
	}
}
