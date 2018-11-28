<?php
namespace MyModule\controller;

use MyApp\HTTP\HTTPRequest;
use MyModule\domaine\repository\UserManagement;
use MyApp\TemplateLoader;
use MyModule\entities\User;

/*
*Class allowing modification of the user account.
*/
class UpdateHerProfil
{
    public function __invoke(HTTPRequest $request)
    {
        if ($request->getSession('id')[0]) {
            $data = (new UserManagement)->userAccount($request->getSession('id')[0]);
            (new TemplateLoader)->twigTemplate('updateHerProfil.php', [
                'user' => $data,
                'request' => $request
                ]);
        } else {
            $message = 'Désolé! mais vous ne pouvez pas accéder à cette page';

            (new TemplateLoader)->twigTemplate('message.php', [
                'message' => $message
                ]);
        }
    }
}
