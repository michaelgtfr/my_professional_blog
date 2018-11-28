<?php
namespace MyModule\controller;

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
        if (!empty($request->getSession('id')) && !empty($request->getSession('email')) && $request->getSession('role') == 'administrateur') {
            (new ArticleManagement)->reqDeleteArticle($request->getParams()[0]);
            $message = 'L\'article a été effacé';
        } else {
            $message = 'Désoler, mais vous ne pouvez pas accéder à cette page.';
        }
        (new TemplateLoader)->generate('message.php', [
            'message' => $message
            ]);
    }
}
