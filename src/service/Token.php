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
            $token = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
            $request->addSession('token', $token);
        }
    }
}
