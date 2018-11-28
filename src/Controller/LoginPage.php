<?php
namespace MyModule\controller;

use MyApp\HTTP\HTTPRequest;
use MyApp\TemplateLoader;
use MyModule\fonction\Dashboard;
use MyModule\fonction\Token;

/**
*Class allowing either the automatic connection or the display of the login page.
*/
class LoginPage
{
    public function __invoke(HTTPRequest $request)
    {
        if ($request->getSession('id') != null && $request->getSession('email') != null) {
            $connection = new Dashboard($request);
        } else {
            new Token($request);
            
            echo (new TemplateLoader)->twigTemplate('loginPage.php', [
                'request'=> $request
                ]);
        }
    }
}
