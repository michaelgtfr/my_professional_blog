<?php
namespace MyModule\controller;

use MyApp\HTTP\HTTPRequest;
use MyApp\TemplateLoader;
use MyModule\domaine\repository\CommentManagement;

/**
*Class to display comments no validate.
*/
class CommentsManagement
{
    public function __invoke(HTTPRequest $request)
    {
        $req = (new CommentManagement)->commentRecovery();

        $message = 'Ici vous pouvez valider ou refuser les commentaires omis par les utilisateurs';

        (new TemplateLoader)->twigTemplate('commentManagement.php', [
                                'request' => $request,
                                'comment' => $req,
                                'message' => $message
                                ]);
    }
}
