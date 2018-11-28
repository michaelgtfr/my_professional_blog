<?php
namespace MyApp;

/**
*Retrieve configuration variables from the database
*/
final class Config
{
    private $settings = [];

    public function loadConfigFromFile($fileName)
    {
        $this->settings = require dirname(__DIR__) .sprintf('/config/%s', $fileName);
    }

    public function get($key)
    {
        return $this->settings[$key];
    }
}
