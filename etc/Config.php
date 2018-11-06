<?php

namespace MyApp; 
/**
*récupére les variables de configuration de la base de données
*/
final class Config 
{
	private $settings = [];

	public function loadConfigFromFile($fileName)
	{
		$this->settings = require_once dirname(__DIR__) .sprintf('/config/%s', $fileName);
	}

    public function get($key)
    {
    	if (!isset($this->settings[$key])) {
            return null;
    	}

    	return $this->settings[$key];
    }
}
