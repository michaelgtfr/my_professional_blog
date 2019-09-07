<?php
namespace MyApp;

use MyApp\HTTP\HTTPRequest;

/**
*Class allowing the controller's call.
*/
class ActionResolver
{
    public function resolveAction(string $module, HTTPRequest $request)
    {
            $call = new $module();
            return $call($request);
    }
}
