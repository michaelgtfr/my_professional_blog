<?php
namespace MyApp;

use MyApp\HTTP\HTTPRequest;

/*
* Verifies that these well the same person who connects, avoids the session theft.
*/
class OPSession
{
    /**
     * Function that retrieves the visitor's IP address
     * Works poorly with Ajax
     */
    public static function IPUser(HTTPRequest $request)
    {
        if (!empty($request->getServer('HTTP_CLIENT_IP'))) {
            return $realIp = $request->getServer('HTTP_CLIENT_IP');
        } elseif (!empty($request->getServer('HTTP_X_FORWARDED_FOR'))) {
            if (strchr($request->getServer('HTTP_X_FORWARDED_FOR'), ',')) {
                $tab = explode(',', $request->getServer('HTTP_X_FORWARDED_FOR'));
                return $realIp = $tab[0];
            }
            $realIp = $request->getServer('HTTP_X_FORWARDED_FOR');
        } else {
            $realIp = $request->getServer('REMOTE_ADDR');
        }
        return $realIp;
    }
    /**
     * Generate a new Session variable
     * is used during the creation or during a session-theft attempt
     */
    public static function newSession(HTTPRequest $request)
    {
        // We copy the session to a new session and then empty this new session
        session_regenerate_id();
        $_SESSION=array();
        $request->addSession('AGENT', $request->getServer('HTTP_USER_AGENT'));
        $request->addSession('ACCEPT', $request->getServer('HTTP_ACCEPT'));
        $request->addSession('LANGUAGE', $request->getServer('HTTP_ACCEPT_LANGUAGE'));
        $request->addSession('ENCODING', $request->getServer('HTTP_ACCEPT_ENCODING'));
        $request->addSession('IP', self::IPUser($request));
    }

    /**
    * Corresponds to the function session_start() but in a secure version
    */
    public static function start(HTTPRequest $request)
    {
        if (empty($request->getSession('IP'))) {
            // If the session was not initialized
            return self::newSession($request);
        }
        // Checking the IP address, accepted encoding, accepted languages and browser
        if ($request->getSession('AGENT') !== $request->getServer('HTTP_USER_AGENT')
            || $request->getSession('ACCEPT') !== $request->getServer('HTTP_ACCEPT')
            || $request->getSession('LANGUAGE') !== $request->getServer('HTTP_ACCEPT_LANGUAGE')
            || $request->getSession('ENCODING') !== $request->getServer('HTTP_ACCEPT_ENCODING')
            || $request->getSession('IP') !== self::IPUser($request)
        ) {
            // If a value is not correct, one overwrites everything and we rewrite
            self::newSession($request);
        }
    }
}
