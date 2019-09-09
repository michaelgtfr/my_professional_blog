<?php
namespace MyModule\controller;

use MyApp\TemplateLoader;
use MyApp\HTTP\HTTPRequest;
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

        (new TemplateLoader)->twigTemplate('articleManagement.php', [
            'items' => $reqArticle,
            'request' => $request,
            'message' => $message,
        ]);
    }
}
