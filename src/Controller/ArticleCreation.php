<?php

namespace MyModule\Controller;

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
            echo (new TemplateLoader)->generate('articleCreation.php', [
                'request' => $request
                ]);
        } else {
            $request->addSession('message', 'Désoler, mais vous pouvez pas aller sur cette page sans vous connectez.');
        
            echo (new TemplateLoader)->generate('message.php', [
                'request' => $request
                ]);
        }
    }
}
