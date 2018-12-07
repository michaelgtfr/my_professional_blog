<?php
namespace MyModule\Controller;

use MyApp\HTTP\HTTPRequest;
use MyModule\domaine\repository\ArticleManagement;
use MyApp\TemplateLoader;
use MyModule\entities\Items;

/**
*Class allowing the recovery of an invalidated article.
*/
class DetailArticleNoValidate
{
    public function __invoke(HTTPRequest $request)
    {
        $article = (new ArticleManagement)->reqArticleNoValidate($request->getParams()[0]);

        (new TemplateLoader)->twigTemplate('detailArticleNoValidate.php', [
            'article' => $article
            ]);
    }
}
