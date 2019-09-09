<?php
namespace MyModule\controller;

use MyApp\HTTP\HTTPRequest;
use MyModule\domaine\repository\UserManagement;
use MyApp\TemplateLoader;

/*
*Class allowing modification of the user account.
*/
class UpdateHerProfil
{
    public function __invoke(HTTPRequest $request)
    {
        if ($request->getSession('id')) {
            $data = (new UserManagement)->userAccount($request->getSession('id'));
            return (new TemplateLoader)->twigTemplate('updateHerProfil.php', [
                'user' => $data,
                'request' => $request
                ]);
        }
        $message = 'Désolé! mais vous ne pouvez pas accéder à cette page';

        (new TemplateLoader)->twigTemplate('message.php', [
                'message' => $message
                ]);
    }
}
