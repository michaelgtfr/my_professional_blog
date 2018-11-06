<?php

namespace MyModule\Controller;

use MyApp\TemplateLoader;
use MyApp\HTTP\HTTPRequest;
use MyModule\domaine\repository\UserManagement;
use MyModule\entities\User;
use MyModule\fonction\SendEmail;

/**
*Class allowing deletion by denying validation of a validated user account.
*/
class userAccountReject
{
    private $templateLoader;

    public function __construct()
    {
        $this->templateLoader = new TemplateLoader();
    }

    public function __invoke(HTTPRequest $request)
    {
        $data = new UserManagement;
	    $emailAndPhoto = $data->reqUserEmailAndPhotoAccount($request->getParams()[0]);

        $content = $this->templateLoader->generate('userAccountReject.php', []);

        new SendEmail($emailAndPhoto->getEmail(), 'Désoler, refus de validation votre compte utilisateur', $content);
	    $data->reqUserAccountReject($request->getParams()[0]);
        //delete the photo in the avatar folder
	    unlink(__DIR__.'./../../public/img/avatar/'.$emailAndPhoto->getPhoto());
        $return = (new userManagement)->userAccountNoValidate();

        $request->addSession('message', 'Le compte à été supprimé. Il recevera un message lui disant que sont compte à été refusé. Vous pouvez continué à juger des comptes utilisateurs si vous le voulez');

        echo $this->templateLoader->generate('userAccountManagement.php', [
            'user' => $return,
            'request' => $request]);
    }
}
