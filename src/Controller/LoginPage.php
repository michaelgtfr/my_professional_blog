<?php

namespace MyModule\Controller;

use MyApp\HTTP\HTTPRequest;
use MyApp\TemplateLoader;
use MyModule\fonction\Dashboard;

/**
*class allowing either the automatic connection or the display of the login page.
*/
class LoginPage
{
    public function __invoke(HTTPRequest $request)
    {
        if ($request->getSession('id') != null && $request->getSession('email') != null) {
            $connection = new Dashboard($request);
        } else {
            echo (new TemplateLoader)->generate('loginPage.php', []);
        }
    }
}
