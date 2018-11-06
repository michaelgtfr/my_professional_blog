<?php

namespace MyModule\Controller;

use MyApp\TemplateLoader;
use MyApp\HTTP\HTTPRequest;
use MyModule\domaine\repository\UserManagement;
use MyModule\entities\User;

/**
*Class to display the list of accounts to be validated.
*/
class userAccountManagement
{
    public function __invoke(HTTPRequest $request)
    {

	    if (!empty($session->getId()) && !empty($session->getEmail()) && $session->getRole() == 'administrateur') {
	        $return = (new UserManagement)->userAccountNoValidate();

	        $request->addSession('message', 'Vous voici dans la partie validation des comptes éditeurs. Vous pouvez choisir si oui ou non il peut faire partie des éditeur du site.');

	        echo (new TemplateLoader)->generate('userAccountManagement.php', [
                'user' => $return, 
                'request' => $request
                ]);
        } else {
    	    $request->addSession('message', 'Désoler vous ne pouvez pas accéder à cette page');
    	    echo (new TemplateLoader)->generate('message.php', $request);
        }
    }
}
