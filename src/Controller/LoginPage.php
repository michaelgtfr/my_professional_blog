<?php
namespace MyModule\controller;

use MyApp\HTTP\HTTPRequest;
use MyApp\TemplateLoader;
use MyModule\service\Dashboard;
use MyModule\service\Token;

/**
*Class allowing either the automatic connection or the display of the login page.
*/
class LoginPage
{
    public function __invoke(HTTPRequest $request)
    {
        if ($request->getSession('id') != null && $request->getSession('email') != null) {
            return new Dashboard($request);
        }
        new Token($request);
            
        (new TemplateLoader)->twigTemplate('loginPage.php', [
            'request'=> $request
            ]);
    }
}
