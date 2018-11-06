<?php

namespace MyApp;

use MyApp\HTTP\HTTPRequest;
/**
*class permettant l'appelle du controleur
*/
class ActionResolver
{
    public function resolveAction(string $module, HTTPRequest $request)
    {
            $call = new $module();
            return $call($request);
    }
}
