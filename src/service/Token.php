<?php
namespace MyModule\service;

use MyApp\HTTP\HTTPRequest;

/**
*Class of CSRF fault protection.
*/
class Token
{
    public function __construct(HTTPRequest $request)
    {
        if ($request->getSession('token') == null) {
            $token = bin2hex(random_bytes(32));
            $request->addSession('token', $token);
        }
    }
}
