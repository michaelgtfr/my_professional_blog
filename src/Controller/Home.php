<?php
namespace MyModule\Controller;

use MyApp\HTTP\HTTPRequest;
use MyModule\domaine\repository\ArticleManagement;
use MyApp\TemplateLoader;
use MyModule\entities\Items;

/**
*class controller of the homepage.
*/
class Home
{
    public function __invoke(HTTPRequest $request)
    {
        $articleReturn = (new ArticleManagement)->lastThreeAddition();
        (new TemplateLoader)->twigTemplate('home.php', [
            'article' => $articleReturn
            ]);
    }
}
