<?php

namespace MyModule\Controller;

use MyApp\HTTP\HTTPRequest;
use MyModule\domaine\repository\UserManagement;
use MyApp\TemplateLoader;
use MyModule\entities\User;

/*
*Class allowing modification of the user account.
*/
class UpdateHerProfil
{
    public function __invoke(HTTPRequest $request)
    {
	    if($request->getSession('id')[0]) {
            $return = (new UserManagement)->userAccount($request->getSession('id')[0]);
            Tempecho (new TemplateLoader)->generate('updateHerProfil.php', $return);
	    } else {
		    $request->addSession('message', 'Désolé! mais vous ne pouvez pas accéder à cette page');
		    echo (new TemplateLoader)->generate('message.php', $request);
	    }
    }
}
