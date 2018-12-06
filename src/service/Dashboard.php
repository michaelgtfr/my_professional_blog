<?php
namespace MyModule\service;

use MyApp\TemplateLoader;
use MyModule\domaine\repository\UserManagement;
use MyApp\HTTP\HTTPRequest;

/**
*Class to login to a user account.
*/
class Dashboard
{
    public function __construct(HTTPRequest $request)
    {
        $request->addSession('message', null);
        $result = (new UserManagement)->userAccount($request->getSession('id'));
        
        echo (new TemplateLoader)->twigTemplate('dashboard.php', [
            'result' => $result
            ]);
    }
}
