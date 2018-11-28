<?php
namespace MyModule\Controller;

use MyApp\HTTP\HTTPRequest;
use MyModule\fonction\Pagination;
use MyApp\TemplateLoader;
use MyModule\entities\Items;

/**
*Class controler of the item listing page.
*/
class ListArticles
{
    public function __invoke(HTTPRequest $request)
    {
        $returnMessages = new Pagination('blog_posts', $request->getParams());

        (new TemplateLoader)->twigTemplate('listOfArticles.php', [
            'message' => $returnMessages->getReqMessage(),
            'numberOfPages' => $returnMessages->getNumberOfPages(),
            'currentPage' => $returnMessages->getCurrentPage()
        ]);
    }
}
