<?php
namespace MyModule\controller;

use MyApp\TemplateLoader;
use MyModule\domaine\repository\UserManagement;
use MyApp\HTTP\HTTPRequest;
use MyModule\service\Dashboard;

/**
*Class allowing element verification for connection to a user account.
*/
class PostConnection
{
    public function __invoke(HTTPRequest $request)
    {
        if ($request->getSession('token') == $request->getPOST('token') && $request->getPOST('email') != null) {
            sleep(0.5);
            $resultat = (new UserManagement)->userRecovery($request->getPOST('email'));

            $PasswordCorrect = password_verify($request->getPOST('password'), $resultat->getPassword());

            if (!$resultat) {
                $message = 'Desolé, mais votre mot de passe ou identifiant est incorrect !';
            
                (new TemplateLoader)->twigTemplate('message.php', [
                    'message' => $message
                    ]);
            } else {
                if ($PasswordCorrect) {
                    $request->addSession('id', $resultat->getId());
                    $request->addSession('email', $resultat->getEmail());
                    $request->addSession('role', $resultat->getRole());
                    $connection = new Dashboard($request);
                } else {
                    $message = 'Desolé, mais votre mot de passe ou identifiant est incorrect !';

                    (new TemplateLoader)->twigTemplate('message.php', [
                        'message' => $message
                        ]);
                }
            }
        } else {
            $message = 'Désolé! un erreur est survenu veuillez réessayer ultérieurement ou envoyer un message à un administrateur';

            (new TemplateLoader)->twigTemplate('message.php', [
                'message' => $message
                ]);
        }
    }
}
