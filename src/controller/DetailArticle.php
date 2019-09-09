<?php
namespace MyModule\Controller;

use MyApp\HTTP\HTTPRequest;
use MyModule\domaine\repository\ArticleManagement;
use MyModule\domaine\repository\CommentManagement;
use MyApp\TemplateLoader;

/**
*Class controller of the item detail page.
*/
class DetailArticle
{
    public function __invoke(HTTPRequest $request)
    {
        $params = $request->getParams();
        $data = (new ArticleManagement)->articleDetail($params[0]);
        $comment = (new CommentManagement)->detailComment($params[0]);

        (new TemplateLoader)->twigTemplate('articleDetail.php', [
            'article' => $data,
            'comment' => $comment,
            'request' => $request
        ]);
    }
}
