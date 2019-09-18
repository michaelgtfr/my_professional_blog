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

            $article = (new ArticleManagement)->articleDetail($request->getParams()[0]);
            $picture = "{$article->getNamePicture()}.{$article->getExtentionPicture()}";
            unlink(__DIR__.'./../../public/img/imgPost/'. $picture);

            (new ArticleManagement)->reqDeleteArticle($request->getParams()[0]);

            $message = 'L\'article a été effacé';
            
            return (new TemplateLoader)->twigTemplate('message.php', [
            'message' => $message
            ]);
        }
        $message = 'Désoler, mais vous ne pouvez pas accéder à cette page.';

        (new TemplateLoader)->twigTemplate('message.php', [
            'message' => $message
            ]);
    }
}
