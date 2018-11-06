<?php

namespace MyModule\Controller;

use MyApp\HTTP\HTTPRequest;
use MyModule\domaine\repository\ArticleManagement;
use MyApp\TemplateLoader;
use MyModule\entities\Items;

/**
*Class allowing the recovery of an invalidated article.
*/
class detailArticleNoValidate
{
	public function __invoke(HTTPRequest $request)
	{
		$returnMessages = (new ArticleManagement)->reqArticleNoValidate($request->getPOST()[0]);

		echo (new TemplateLoader)->generate('detailArticleNoValidate.php', $returnMessages);
	}
}
