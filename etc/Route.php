<?php
namespace MyApp;

/**
*Saves routes.
*/
class Route
{
    private $path;
    private $methods = [];
    private $action;
    private $params = [];

    public function __construct($path, $methods, $action, $params = [])
    {
        $this->path = $path;
        $this->methods = $methods;
        $this->action = $action;
        $this->params = $params;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getMethods()
    {
        return $this->methods;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getParams()
    {
        return $this->params;
    }
}
