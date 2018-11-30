<?php
namespace MyApp;

/*
* Verifies that these well the same person who connects, avoids the session theft.
*/
class OPSession
{
    /**
     * Function that retrieves the visitor's IP address
     * Works poorly with Ajax
     */
    public static function IP()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $realIp = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            if (strchr($_SERVER['HTTP_X_FORWARDED_FOR'], ',')) {
                 $tab = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                 $realIp = $tab[0];
            } else {
                $realIp = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
        } else {
            $realIp = $_SERVER['REMOTE_ADDR'];
        }
        return $realIp;
    }
    /**
     * Generate a new Session variable
     * is used during the creation or during a session-theft attempt
     */
    public static function newSession()
    {
        // We copy the session to a new session and then empty this new session
        session_regenerate_id();
        $_SESSION=array();
        $_SESSION['AGENT']    = $_SERVER['HTTP_USER_AGENT'];
        $_SESSION['ACCEPT']   = $_SERVER['HTTP_ACCEPT'];
        $_SESSION['LANGUAGE'] = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
        $_SESSION['ENCODING'] = $_SERVER['HTTP_ACCEPT_ENCODING'];
        $_SESSION['IP']       = self::IP();
    }

    /**
    * Corresponds to the function session_start() but in a secure version
    */
    public static function start()
    {
        session_start();
        if (!isset($_SESSION['IP'])) {
            // If the session was not initialized
            self::newSession();
        } else {
            // Checking the IP address, accepted encoding, accepted languages and browser
            if ($_SESSION['AGENT'] !== $_SERVER['HTTP_USER_AGENT']
                || $_SESSION['ACCEPT'] !== $_SERVER['HTTP_ACCEPT']
                || $_SESSION['LANGUAGE'] !== $_SERVER['HTTP_ACCEPT_LANGUAGE']
                || $_SESSION['ENCODING'] !== $_SERVER['HTTP_ACCEPT_ENCODING']
                || $_SESSION['IP'] !== self::IP()
            ) {
                // If a value is not correct, one overwrites everything and we rewrite
                self::newSession();
            }
        }
    }
}
