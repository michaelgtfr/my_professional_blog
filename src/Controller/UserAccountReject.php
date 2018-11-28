<?php
namespace MyModule\controller;

use MyApp\TemplateLoader;
use MyApp\HTTP\HTTPRequest;
use MyModule\domaine\repository\UserManagement;
use MyModule\entities\User;
use MyModule\fonction\SendEmail;

/**
*Class allowing deletion by denying validation of a validated user account.
*/
class UserAccountReject
{
    private $templateLoader;

    public function __construct()
    {
        $this->templateLoader = new TemplateLoader();
    }

    public function __invoke(HTTPRequest $request)
    {
        if ($request->getSession('token') == $request->getGET('token')) {
            $data = new UserManagement;
            $emailAndPhoto = $data->reqUserEmailAndPhotoAccount($request->getGET('id'));

            $content = $this->templateLoader->generate('userAccountReject.php', []);

            new SendEmail($emailAndPhoto->getEmail(), 'Désoler, refus de validation votre compte utilisateur', $content);
            $data->reqUserAccountReject($request->getGET('id'));
            //delete the photo in the avatar folder
            unlink(__DIR__.'./../../public/img/avatar/'.$emailAndPhoto->getPhoto());
            $return = (new userManagement)->userAccountNoValidate();

            $message = 'Le compte à été supprimé. Il recevera un message lui disant que sont compte à été refusé. Vous pouvez continué à juger des comptes utilisateurs si vous le voulez';

            $this->templateLoader->twigTemplate('userAccountManagement.php', [
                'user' => $return,
                'request' => $request,
                'message' => $message
                ]);
        } else {
            $message = 'désolé! mais votre requête n\a pas aboutie, veuillez réessayer ultérieurement ou envoyer un email à un administrateur.';

            $this->templateLoader->twigTemplate('message', [
                'message' => $message
                ]);
        }
    }
}
