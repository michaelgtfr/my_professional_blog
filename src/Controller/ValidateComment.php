<?php

namespace MyModule\Controller;

use MyApp\TemplateLoader;
use MyApp\HTTP\HTTPRequest;
use MyModule\domaine\repository\CommentManagement;
use MyModule\entities\Comment;

/**
*Class allowing the validation of a comment.
*/
class validateComment
{
	public function __invoke(HTTPRequest $request)
	{
    	validationComment($request->getParams()[0]);

    	$request->addSession('message', 'La validation du commentaire est réussit, vous pouvez continuer si vous le voulez à valider d\'autre commentaire');

    	$data = commentRecovery();

    	echo (new TemplateLoader)->generate('commentManagement.php', [
    		'request' => $request, 
    		'comment' => $data
    		));
	}
}
