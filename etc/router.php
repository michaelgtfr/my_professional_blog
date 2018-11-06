<?php

namespace MyApp;

use MyApp\HTTP\HTTPRequest;
use MyApp\ActionResolver;

/**
*Class allowing corelation of the roads compared to the url
*/
class Router
{
    private $routes = [];
    private $routePath;
    private $error = true;

    /** Uses "loadRoutes" */
    public function __construct()
    {
        $this->loadRoutes();
    }  

    /** Retrieve the road and record them in "Route" */
    private function loadRoutes()
    {
        $routes = require_once __DIR__.'/../config/routes.php';
        foreach($routes as $route) {
            $this->routes[] = new Route($route['path'], $route['method'], $route['module'], $route['action'], $route['params'] ?? []);
        }
    }

    /**Check corelation between the road and the url */
    public function handleRequest(HTTPRequest $request)
    {
        foreach ($this->routes as $key => $route) {
            switch ($route->getPath()) {
                case in_array($request->getMethod(), $route->getMethods()):
                $this->routePath = $route->getPath();
                $request->setParams($this->catchParams($route->getParams() ?? [],$request->getURL(), $this->routePath));
                if ($this->routePath === $request->getURL() && in_array($request->getMethod(), $route->getMethods())) {
                    $this->error = null;
                    $controler = (new ActionResolver)->resolveAction($route->getModule(), $request);
                }
                break;
            }
        }
        if ($this->error == true) {
        $controler = (new ActionResolver)->resolveAction('MyModule\\Controller\\Error404', $request);
        }
    }  

    /**Method to retrieve the parameters sent by the url*/
    public function catchParams(array $params, string $path, &$routePath)
    {
        foreach ($params as $key => $regex) {
            preg_match('#'.$regex.'#', $path, $result);
            if (is_null($result)) {
                return $result = null;
            } elseif (!empty($result)) {
                $this->routePath = strtr($routePath, ['{'.$key.'}' => $result[0]]);
                return $result;
            }
        } 
    }
}
