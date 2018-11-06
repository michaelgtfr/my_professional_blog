<?php

namespace MyModule\Controller;

use MyApp\HTTP\HTTPRequest;
use MyApp\TemplateLoader;
use MyModule\domaine\repository\CommentManagement;
use MyModule\entities\Comment;

/**
*Class to display comments no validate.
*/
class CommentsManagement
{
	public function __invoke(HTTPRequest $request)
	{
		$req = (new CommentManagement)->commentRecovery();
		$request->addSession('message', 'Ici vous pouvez valider ou refuser les commentaires omis par les utilisateurs');
		echo (new TemplateLoader)->generate('commentManagement.php', array(
								'request' => $request,
								'comment' => $req
								));
	}
}
