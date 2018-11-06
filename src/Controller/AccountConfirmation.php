<?php

namespace MyModule\Controller;

use MyApp\HTTP\HTTPRequest;
use MyApp\TemplateLoader;
use MyModule\domaine\repository\UserManagement;

/**
*Class allowing the confirmation of a user account.
*/
class AccountConfirmation
{
	public function __invoke(HTTPRequest $request)
	{
		$result = (new UserManagement)->confirmation($request->getGET('activation'));
		if ($result->getConfirmationKey() == $request->getGET('cle')) {
    		$req = (new UserManagement)->validateConfirmation($request->getGET('activation'));
    		$request->addSession('message', 'votre compte a été confirmé, un administrateur doit le valider pour pouvoir utiliser votre compte, vous recevrez un message de confirmation dés que celle-ci sera faite (sauf changement de mot de passe).');
    	} else {
    		$request->addSession('message', 'Erreur,votre compte ne peut pas etre active');
    	}
    	echo (new TemplateLoader)->generate('message.php', $request);
	}
}
