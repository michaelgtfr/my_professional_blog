<?php
namespace MyModule\Controller;

use MyApp\HTTP\HTTPRequest;
use MyModule\service\Pagination;
use MyApp\TemplateLoader;

/**
*Class controler of the item listing page.
*/
class ListArticles
{
    public function __invoke(HTTPRequest $request)
    {
        $returnMessages = new Pagination($request->getParams());

        (new TemplateLoader)->twigTemplate('listOfArticles.php', [
            'message' => $returnMessages->getReqMessage(),
            'numberOfPages' => $returnMessages->getNumberOfPages(),
            'currentPage' => $returnMessages->getCurrentPage()
        ]);
    }
}
