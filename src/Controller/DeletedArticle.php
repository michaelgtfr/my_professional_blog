<?php

namespace MyModule\Controller;

use MyApp\HTTP\HTTPRequest;
use MyApp\TemplateLoader;

/**
*Class allowing deleted of the items.
*/
class DeletedArticle
{
	public function __invoke(HTTPRequest $request)
	{
		if(!empty($request->getSession('id')) && !empty($request->getSession('email')) && $request->getSession('role') = 'administrateur') {
			echo (new TemplateLoader)->generate('deletedArticle.php', $request->getParams()[0]);
		} else {
			$request->addSession('message', 'Désoler, mais vous ne pouvez pas accéder à cette page');
			echo (new TemplateLoader)->generate('message.php', $request);
		}
	}
}
