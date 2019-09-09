<?php
namespace MyModule\controller;

use MyApp\HTTP\HTTPRequest;
use MyModule\domaine\repository\ArticleManagement;
use MyApp\TemplateLoader;

/**
*Class to display the edit form for an article.
*/
class ModifyArticle
{
    public function __invoke(HTTPRequest $request)
    {
        if (!empty($request->getSession('id')) && !empty($request->getSession('email'))) {
            $data = (new ArticleManagement)->articleToBeAmended($request->getParams()[0]);

            return (new TemplateLoader)->twigTemplate('modifyArticle.php', [
                'data' => $data,
                'request' => $request
                ]);
        }
        $message = 'désoler, vous ne pouvez pas accéder à cette page';

        (new TemplateLoader)->twigTemplate('message.php', [
            'message' => $message
            ]);
    }
}
