<?php

namespace MyModule\Controller;

use MyApp\HTTP\HTTPRequest;
use MyApp\TemplateLoader;
use MyModule\entities\User;
use MyModule\domaine\repository\UserManagement;

/**
*Class to change his password.
*/
class postResetPassword
{
	private $templateLoader;

    public function __construct()
    {
        $this->templateLoader = new TemplateLoader();
    }

	public function __invoke(HTTPRequest $request)
	{
		$data = new UserManagement;
		$result = $data->verificationElement($request->getPOST('email'), $request->getPOST('name'));

		if (empty($result->getConfirmationKey())) {
			$request->addSession('message', 'Désolé, mais votre compte est introuvable veuillez prévénir un administrateur via le formulaire de contact pour trouver une solution à votre problème.');
			echo $this->templateLoader->generate('message.php', $message);
		} elseif($request->getPOST('passwordOne') != $request->getPOST('passwordTwo')) {
			$request->addSession('message', 'Desolé! vos mots de passes sont différents');
			echo $this->templateLoader->generate('resetPassword.php', $message);
		} else {
        	$password = password_hash($request->getPOST('passwordOne'), PASSWORD_DEFAULT);
        	$data->changePassword($request->getPOST('email'), $password);

        	$content = $this->templateLoader->generate('messageOfConfirmation.php', [
            	    'email' => $request->getPOST('email'),
                	'key' => $result->getConfirmationKey(),
            		]);
        	new sendEmail($request->getPOST('email'), 'Confirmation de votre modification de mot de passe', $content);
        
        	$request->addSession('message', 'Félicitation! votre mot de passe à été modifié, vous pourrez utiliser votre compte aprés la validation de votre nouveau mot de passe envoyé sur votre adresse email');

        	echo $this->templateLoader->generate('postRegistration.php', [
        		'email' => $email,
        		'request' => $request
        		]);
		}
	}
}
