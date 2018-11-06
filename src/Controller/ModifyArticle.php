<?php

namespace MyModule\Controller;

use MyApp\HTTP\HTTPRequest;
use MyModule\domaine\repository\ArticleManagement;
use MyApp\TemplateLoader;
use MyModule\entities\Items;

/**
*Class to display the edit form for an article.
*/
class ModifyArticle
{
    public function __invoke(HTTPRequest $request)
    {
	    if(!empty($request->getSession('id')) && !empty($request->getSession('email'))) {
	        $data = (new ArticleManagement)->articleToBeAmended($request->getParams()[0]);
	        echo (new TemplateLoader)->generate('modifyArticle.php', $data);
        } else {
    	    $request->addSession('message', 'désoler, vous ne pouvez pas accéder à cette page');
    	    echo (new TemplateLoader)->generate('message.php', $request);
        }
    }
}
