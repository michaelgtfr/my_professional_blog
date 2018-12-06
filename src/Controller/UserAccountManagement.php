<?php
namespace MyModule\controller;

use MyApp\TemplateLoader;
use MyApp\HTTP\HTTPRequest;
use MyModule\domaine\repository\UserManagement;
use MyModule\entities\User;

/**
*Class to display the list of accounts to be validated.
*/
class UserAccountManagement
{
    public function __invoke(HTTPRequest $request)
    {
        if (!empty($request->getSession('id')) && !empty($request->getSession('email')) && $request->getSession('role') == 'administrateur') {
            $return = (new UserManagement)->userAccountNoValidate();

            $message = 'Vous voici dans la partie validation des comptes éditeurs. Vous pouvez choisir si oui ou non il peut faire partie des éditeur du site.';

            return (new TemplateLoader)->twigTemplate('userAccountManagement.php', [
                'user' => $return,
                'request' => $request,
                'message' => $message
                ]);
        }
        $message = 'Désoler vous ne pouvez pas accéder à cette page';

        (new TemplateLoader)->twigTemplate('message.php', [
            'message' => $message
            ]);
    }
}
