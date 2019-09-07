<?php
namespace MyModule\controller;

use MyApp\TemplateLoader;
use MyApp\HTTP\HTTPRequest;
use MyModule\domaine\repository\UserManagement;
use MyModule\entities\User;
use MyModule\service\SendEmail;

/**
*Class allowing validation of an unvalidated account.
*/
class UserAccountValidate
{
    private $templateLoader;

    public function __construct()
    {
        $this->templateLoader = new TemplateLoader();
    }

    public function __invoke(HTTPRequest $request)
    {
        if ($request->getGET('token') == $request->getSession('token')) {
            $data = new UserManagement;
            $data->reqUserAccountValidate($request->getGET('id'));

            $content = $this->templateLoader->generate('userAccountValidate.php', []);

            $userEmail = $data->reqUserEmailAccount($request->getGET('id'));

            new SendEmail($userEmail->getEmail(), 'Validation de votre compte utilisateur', $content);

            $return = (new UserManagement)->userAccountNoValidate();

            $message = 'Félicitation! vous avez validé le compte utilisateur. Il recevera un message lui disant qu\'il peut se connecter. Vous pouvez continué à valider des comptes utilisateurs si vous le voulez';

            return $this->templateLoader->twigTemplate('userAccountManagement.php', [
                    'user' => $return,
                    'request' => $request,
                    'message' => $message
                ]);
        }
        $message = 'Désolé! mais votre requête n\a pas aboutie, veuillez réessayer ultérieurement ou envoyer un email à un administrateur.';

        $this->templateLoader->twigTemplate('message', [
            'message' => $message
            ]);
    }
}
