<?php

namespace MyModule\Controler;

use MyApp\HTTP\HTTPRequest;
use MyApp\TemplateLoader;
use MyModule\entities\Comment;
use MyModule\domaine\repository\CommentManagement;

/*
*Class allowing the deletion of comments not validated.
*/
class DeteteComment
{
	public function __invoke(HTTPRequest $request)
	{
		$req = new CommentManagement;
		$req->deletedComment($request->getParams()[0]);
		
		$request->addSession('message') = 'Commentaire supprimer, vous pouvez continué de valider ou refuser des commentaires';

		$req->commentRecovery();

    	echo (new TemplateLoader)->generate('commentManagement.php', array(
    				'request' => $request,
    				'req' => $req)
    				);
	}
}
