<?php
namespace MyModule\controller;

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

        $message = 'Page de validation des articles';

        echo (new TemplateLoader)->twigTemplate('articleManagement.php', array(
            'items' => $reqArticle,
            'request' => $request,
            'message' => $message,
        ));
    }
}
