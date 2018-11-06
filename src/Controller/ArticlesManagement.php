<?php

namespace MyModule\Controller;

use MyApp\TemplateLoader;
use MyApp\HTTP\HTTPRequest;
use MyModule\entities\Items;
use MyModule\domaine\repository\ArticleManagement;

/**
*Class to call the item validation page.
*/
class ArticlesManagement
{
    public function __invoke(HTTPRequest $request)
    {
	    $reqArticle = (new ArticleManagement)->noValidateArticles();
	    $request->addSession('message', 'Page de validation des articles');

	    echo (new TemplateLoader)->generate('articleManagement.php', array(
            'items' => $reqArticle,
            'request' => $request
        ));
    }
}
