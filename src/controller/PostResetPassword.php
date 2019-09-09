<?php
namespace MyModule\controller;

use MyApp\HTTP\HTTPRequest;
use MyApp\TemplateLoader;
use MyModule\domaine\repository\UserManagement;
use MyModule\service\SendEmail;

/**
*Class to change his password.
*/
class PostResetPassword
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
            $data = new UserManagement;
            $result = $data->verificationElement($request->getPOST('email'), $request->getPOST('name'));
            if (empty($result->getConfirmationKey())) {
                $message = 'Désolé, mais votre compte est introuvable veuillez prévénir un administrateur via le formulaire de contact pour trouver une solution à votre problème.';

                return $this->templateLoader->twigTemplate('message.php', [
                                                    'message' => $message
                                                    ]);
            } elseif ($request->getPOST('passwordOne') != $request->getPOST('passwordTwo')) {
                $message = 'Desolé! vos mots de passes sont différents';

                return $this->templateLoader->twigTemplate('resetPassword.php', [
                                                'request' => $request,
                                                'message' => $message
                                                ]);
            } else {
                $password = password_hash($request->getPOST('passwordOne'), PASSWORD_DEFAULT);
                $data->changePassword($request->getPOST('email'), $password);

                $content = $this->templateLoader->generate('messageOfConfirmation.php', [
                        'email' => $request->getPOST('email'),
                        'key' => $result->getConfirmationKey(),
                        ]);
                new SendEmail($request->getPOST('email'), 'Confirmation de votre modification de mot de passe', $content);
        
                $message = 'Félicitation! votre mot de passe à été modifié, vous pourrez utiliser votre compte aprés la validation de votre nouveau mot de passe envoyé sur votre adresse email';

                return $this->templateLoader->twigTemplate('postRegistration.php', [
                    'message' => $message,
                    'request' => $request
                    ]);
            }
        }
        $message = 'désolé! mais votre requête n\a pas aboutie, veuillez réessayer ultérieurement ou envoyer un email à un administrateur.';

        $this->templateLoader->twigTemplate('message.php', [
            'message' => $message
            ]);
    }
}
