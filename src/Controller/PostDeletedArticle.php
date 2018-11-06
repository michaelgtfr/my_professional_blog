<?php


namespace MyModule\Controller;

use MyApp\HTTP\HTTPRequest;
use MyApp\TemplateLoader;
use MyModule\domaine\repository\ArticleManagement;

/**
*Class allowing the deletion of an article. 
*/
class PostDeletedArticle
{
	public function __invoke(HTTPRequest $request)
	{
		if (!empty($request->getSession('id')) && !empty($request->getSession('email')) && $request->getSession('role') = 'administrateur') {
	    	(new ArticleManagement)->reqDeleteArticle($request->getParams()[0]);
	    	$request->addSession('message', 'L\'article a été effacé');
		} else {
			$request->addSession('message', 'Désoler, mais vous ne pouvez pas accéder à cette page.');
		}
		echo (new TemplateLoader)->generate('message.php', $request);
	}
}
