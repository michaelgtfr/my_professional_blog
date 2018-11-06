<?php

namespace MyModule\Controller;

use MyApp\TemplateLoader;
use MyModule\domaine\repository\UserManagement;
use MyApp\HTTP\HTTPRequest;
use MyModule\fonction\Dashboard;

/**
*Class allowing element verification for connection to a user account.
*/
class PostConnection
{
    public function __invoke(HTTPRequest $request)
    {
        $resultat = (new UserManagement)->userRecovery($request->getPOST('email'));

        $PasswordCorrect = password_verify($request->getPOST('password'), $resultat->getPassword());

        if (!$resultat) {
            $request->addSession('message', 'Desolé, mais votre mot de passe ou identifiant est incorrect !');
            
            echo (new TemplateLoader)->generate('message.php', $request);
        } else {
	        if ($PasswordCorrect) {
                $request->addSession('id', $resultat->getId());
                $request->addSession('email', $resultat->getEmail());
                $request->addSession('role', $resultat->getRole());
                $connection = new Dashboard($request);
   	        } else {
		        $request->addSession('message', 'Desolé, mais votre mot de passe ou identifiant est incorrect !');

                echo (new TemplateLoader)->generate('message.php', $request);
	        }
        }
    }
}
