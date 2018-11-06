<?php

namespace MyModule\fonction;

use MyApp\TemplateLoader;
use MyModule\domaine\repository\UserManagement;
use MyApp\HTTP\HTTPRequest;

/**
*Class permettant la connexion à un compte utilisateur.
*/
class Dashboard
{
    public function __construct(HTTPRequest $request)
    {
        $result = (new UserManagement)->userAccount($request->getSession('id'));
        echo (new TemplateLoader)->generate('dashboard.php', $result);
    }
}
