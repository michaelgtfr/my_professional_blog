<?php
namespace MyModule\Controller;

use MyApp\HTTP\HTTPRequest;
use MyApp\TemplateLoader;

/**
*Class to display the error404 page.
*/
class Error404
{
    public function __invoke()
    {
        echo (new TemplateLoader)->twigTemplate('error404.php', []);
    }
}
