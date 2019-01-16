<?php
namespace MyApp\HTTP;

use MyApp\HTTP\HTTPSession;

/**
*Class containing customer requests.
*/
class HTTPRequest
{
    protected $results = [];
    protected $request = [];
    protected $query = [];
    protected $files = [];
    protected $server = [];
    protected $attributes = [];
    protected $session = [];


    public function __construct($query, $request, $files, $server)
    {
        $this->query = $query;
        $this->request = $request;
        $this->files = $files;
        $this->server = $server;
        $this->attributes = [];
        $this->session = new HTTPSession();
    }

    /**Create an instantiation and return the requested data*/
    public static function createFromGlobals()
    {
        return new self($_GET, $_POST, $_FILES, $_SERVER);
    }

    public function getMethod()
    {
        return $this->server['REQUEST_METHOD'];
    }

    public function getURL()
    {
        return $this->server['REQUEST_URI'];
    }

    public function setURL($value)
    {
        $this->server['REQUEST_URI'] = $value;
    }

    public function getServer($key, $value = null)
    {
        return $this->server[$key] ?? $value;
    }

    public function getPOST($key)
    {
        return htmlspecialchars($this->request[$key]);
    }

    public function getParams()
    {
        return $this->attributes;
    }

    public function setParams($attributes)
    {
        $this->attributes = $attributes;
    }

    public function getFILES($name, $key)
    {
        return $this->files[$name][$key];
    }

    public function getGET($key)
    {
        return htmlspecialchars($this->query[$key]);
    }

    public function getSession($key)
    {
        return $this->session->get($key);
    }

    public function addSession($key, $value)
    {
        return $this->session->add($key, $value);
    }
}
