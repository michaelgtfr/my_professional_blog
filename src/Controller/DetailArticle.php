<?php

namespace MyModule\Controller;

use MyApp\HTTP\HTTPRequest;
use MyModule\domaine\repository\ArticleManagement;
use MyModule\domaine\repository\CommentManagement;
use MyApp\TemplateLoader;
use MyModule\entities\Items;
use MyModule\entities\Comment;

/**
*class controller of the item detail page.
*/
class DetailArticle
{
    public function __invoke(HTTPRequest $request)
    {
    	$params = $request->getParams();
	    $data = (new ArticleManagement)->articleDetail($params[0]);
	    $comment = (new CommentManagement)->detailComment($params[0]);

	    echo (new TemplateLoader)->generate('articleDetail.php', array(
	    	'article' => $data,
	    	'comment' => $comment,
	    	'request' => $request
	    ));
    }
}
