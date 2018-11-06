<?php

namespace MyModule\Controller;

use MyApp\TemplateLoader;
use MyApp\HTTP\HTTPRequest;
use MyModule\domaine\repository\UserManagement;
use MyModule\entities\User;
use MyModule\fonction\SendEmail;

/**
*Class allowing validation of an unvalidated account.
*/
class userAccountValidate
{
    private $templateLoader;

    public function __construct()
    {
        $this->templateLoader = new TemplateLoader();
    }

    public function __invoke(HTTPRequest $request)
    {
        $data = new UserManagement;
        $data->reqUserAccountValidate($request->getparams()[0]);

        $content = $this->templateLoader->generate('userAccountValidate.php', [])

        new SendEmail(
            $data->reqUserEmailAccount($request->getParams()[0])->getEmail(),
            'Validation de votre compte utilisateur',
            $content
        );

        $return = (new UserManagement)->userAccountNoValidate();

        $request->addSession('message', 'Félicitation! vous avez validé le compte utilisateur. Il recevera un message lui disant qu\'il peut se connecter. Vous pouvez continué a valider des comptes utilisateurs si vous le voulez');

        echo $this->templateLoader->generate('userAccountManagement.php', array(
            'user' => $return,
            'message' => $message
        ));
    }
}