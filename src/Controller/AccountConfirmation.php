<?php
namespace MyModule\controller;

use MyApp\HTTP\HTTPRequest;
use MyApp\TemplateLoader;
use MyModule\domaine\repository\UserManagement;
use MyModule\entities\User;

/**
*Class allowing the confirmation of a user account.
*/
class AccountConfirmation
{
    public function __invoke(HTTPRequest $request)
    {
        $result = (new UserManagement)->confirmation($request->getGET('activation'));

        if (!empty($result) && $result->getConfirmationKey() == $request->getGET('cle')) {
            (new UserManagement)->validateConfirmation($request->getGET('activation'));
            $message = 'votre compte a été confirmé, un administrateur doit le valider pour pouvoir utiliser votre compte, vous recevrez un message de confirmation dés que celle-ci sera faite (sauf changement de mot de passe).';

            return (new TemplateLoader)->twigTemplate('message.php', [
            'message' => $message
            ]);
        }
        $message = 'Erreur, Désolé! votre compte ne peut pas être activé';
        
        (new TemplateLoader)->twigTemplate('message.php', [
            'message' => $message
            ]);
    }
}
