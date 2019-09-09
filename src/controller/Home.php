<?php
namespace MyModule\Controller;

use MyModule\domaine\repository\ArticleManagement;
use MyApp\TemplateLoader;

/**
*class controller of the homepage.
*/
class Home
{
    public function __invoke()
    {
        $articleReturn = (new ArticleManagement)->lastThreeAddition();
        (new TemplateLoader)->twigTemplate('home.php', [
            'article' => $articleReturn
            ]);
    }
}
