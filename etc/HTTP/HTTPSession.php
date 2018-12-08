<?php
namespace MyApp\HTTP;

/**
*Class allowing the creation of a session and the retrieval of SESSION elements.
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
