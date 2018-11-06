<?php

namespace MyModule\Controller;

use MyApp\HTTP\HTTPRequest;
use MyApp\TemplateLoader;
use MyModule\domaine\repository\CommentManagement;
use MyModule\entities\Comment;
use MyModule\entities\Items;
use MyModule\domaine\repository\ArticleManagement;

/**
*Class to check and record a comment for an article.
*/
class FormComment
{
	public function __invoke(HTTPRequest $request)
	{
    	$data = new CommentManagement;
    	$data->addComment($request->getPOST('author'), $request->getPOST('content'), $request->getPOST('email'), $request->getPOST('id'));

    	$request->addSession('message', 'Félicitation! votre message à été envoyer avec succés. Il doit être validé par un administrateur avant qu\'il soit affiché sur l\'article du blog');

    	$data = (new ArticleManagement)->articleDetail($request->getPOST('id'));
		$comment = $data->detailComment($request->getPOST('id'));

		echo (new TemplateLoader)->generate('articleDetail.php', [
					'data' => $data,
					'comment' => $comment,
					'message' =>$message
					]);
	}
}
