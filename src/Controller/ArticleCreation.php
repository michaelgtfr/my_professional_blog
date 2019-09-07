<?php
namespace MyModule\controller;

use MyApp\HTTP\HTTPRequest;
use MyApp\TemplateLoader;

/**
*Class to call the article creation form.
*/
class ArticleCreation
{
    public function __invoke(HTTPRequest $request)
    {
        if (!empty($request->getSession('id')) && !empty($request->getSession('email'))) {
            return (new TemplateLoader)->twigTemplate('articleCreation.php', [
                'request' => $request
                ]);
        }
        $message = 'Désoler, mais vous pouvez pas aller sur cette page sans vous connectez.';
        
        (new TemplateLoader)->twigTemplate('message.php', [
            'message' => $message
            ]);
    }
}
