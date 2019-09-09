<?php
namespace MyModule\controller;

use MyApp\TemplateLoader;
use MyApp\HTTP\HTTPRequest;
use MyModule\domaine\repository\CommentManagement;

/**
*Class allowing the validation of a comment.
*/
class ValidateComment
{
    public function __invoke(HTTPRequest $request)
    {
        if ($request->getSession('token') == $request->getGET('token')) {
            $data = new CommentManagement;
            $data->validationComment($request->getGET('id'));

            $message = 'La validation du commentaire est réussit, vous pouvez continuer si vous le voulez à valider d\'autre commentaire';

            $comment =  $data->commentRecovery();

            return (new TemplateLoader)->twigTemplate('commentManagement.php', [
                'request' => $request,
                'comment' => $comment,
                'message' => $message
                ]);
        }
        $message = 'désolé! mais votre requête n\'a pas aboutie, veuillez réessayer ultérieurement ou envoyer un email à un administrateur.';

        $this->templateLoader->twigTemplate('message.php', [
            'message' => $message
            ]);
    }
}
