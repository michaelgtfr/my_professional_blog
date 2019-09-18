<?php
namespace MyModule\controller;

use MyApp\HTTP\HTTPRequest;
use MyApp\TemplateLoader;
use MyModule\domaine\repository\UserManagement;
use MyModule\entities\User;
use MyModule\service\SendEmail;

/**
*Class for reconfirming an email from an invalid user account.
*/
class PostEmailReconfirmation
{
    private $templateLoader;

    public function __construct()
    {
        $this->templateLoader = new TemplateLoader();
    }

    public function __invoke(HTTPRequest $request)
    {
        $email = str_replace(array("\n","\r",PHP_EOL), '', $request->getPOST('email'));
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $data = new UserManagement();
            $result = $data->confirmation($request->getPOST('previousEmail'));

            if ($request->getPOST('email') != $request->getPOST('previousEmail')) {
                $data->updateEmail($result->getid(), $request->getPOST('email'));
            }

            if ($result->getConfirmation() == 1) {
                $message = 'votre compte est déjà confirmé, veuillez attendre qu\'un administrateur valide votre compte';
            
                $this->templateLoader->twigTemplate('message.php', [
                    'message' => $message
                    ]);
            } elseif (!empty($result->getConfirmationKey())) {
                $content = $this->templateLoader->generate('postEmailReconfirmation.php', [
                    'email' => $request->getPOST('email'),
                    'key' => $result->getConfirmationKey()
                ]);
                new SendEmail($request->getPOST('email'), 'Confirmation de votre compte', $content);

                $message = "Félicitation! votre email de confirmation de compte à été envoyer.";

                $this->templateLoader->twigTemplate('postRegistration.php', [
                    'request' => $request,
                    'message' => $message
                    ]);
            } else {
                $message = "desoler, le message ne peut pas être ré-envoyé. Contacter un administrateur du site via le formulaire de contact sur la page d'accueil";

                $this->templateLoader->twigTemplate('message.php', [
                    'message' => $message
                    ]);
            }
        } else {
            $message = 'désolé! mais votre requête n\a pas aboutie, veuillez réessayer ultérieurement ou envoyer un email à un administrateur.';

            $this->templateLoader->twigTemplate('message', [
                'message' => $message
                ]);
        }
    }
}
