<?php
namespace MyModule\Controller;

use MyApp\HTTP\HTTPRequest;
use MyApp\TemplateLoader;
use MyModule\entities\Comment;
use MyModule\domaine\repository\CommentManagement;

/**
*Class allowing the deletion of comments not validated.
*/
class DeleteComment
{
    public function __invoke(HTTPRequest $request)
    {
        if ($request->getSession('token') == $request->getGET('token')) {
            $req = new CommentManagement;
            $req->deletedComment($request->getGET('id'));
        
            $message = 'Commentaire supprimer, vous pouvez continué de valider ou refuser des commentaires';

            $comment = $req->commentRecovery();

            (new TemplateLoader)->twigTemplate('commentManagement.php', [
                    'request' => $request,
                    'comment' => $comment,
                    'message' => $message
                    ]);
        } else {
            $message = 'désolé! mais votre requête n\'a pas aboutie, veuillez réessayer ultérieurement ou envoyer un email à un administrateur.';

            (new TemplateLoader)->twigTemplate('message.php', [
                'message' => $message
                ]);
        }
    }
}
