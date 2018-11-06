<?php 

namespace MyModule\Controller;

use MyApp\HTTP\HTTPRequest;
use MyApp\TemplateLoader;
use MyModule\domaine\repository\UserManagement;
use MyModule\entities\User;

/**
*Class for reconfirming an email from an invalid user account.
*/
Class PostEmailReconfirmation
{
    private $templateLoader;

    public function __construct()
    {
        $this->templateLoader = new TemplateLoader();
    }

    public function __invoke(HTTPResquest $request)
    {
        $data = new UserManagement()
        $result = $data->confirmation($request->getPOST('previousEmail'));

        if ($request->getPOST('email') != $request->getPOST('previousEmail')) {
            updateEmail($result->getid(), $request->getPOST('email'));
        }

	    if ($result->getConfirmation() == 1) {
    	    $request->addSession('message', 'votre compte est déjà confirmé, veuillez attendre qu\'un administrateur valide votre compte');
            
    	    echo $this->templateLoader->generate('message.php', $request);
	    } elseif (!empty($result->getConfirmationKey())) {
            $content = $this->templateLoader->generate('postEmailReconfirmation.php', [
                'email' => $request->getPOST('email'),
                'message' => $result->getPOST('key')
            ]);
            new SendEmail($request->getPOST('email'), 'Confirmation de votre compte', $content);

            echo $this->templateLoader->generate('postRegistration.php', $request->getPOST('email'));
	    } else {
		    $request->addSession('message', "desoler, le message ne peut pas être ré-envoyé. Contacter un administrateur du site via le formulaire de contact sur la page d'accueil");

		    echo $this->templateLoader->generate('message.php', $request);
	    }
    }
}
