<?php
namespace MyModule\Controller;

use MyApp\HTTP\HTTPRequest;
use MyApp\TemplateLoader;

/**
*Class allowing deleted of the items.
*/
class DeletedArticle
{
    public function __invoke(HTTPRequest $request)
    {
        if (!empty($request->getSession('id')) && !empty($request->getSession('email')) && $request->getSession('role') == 'administrateur') {
            echo (new TemplateLoader)->twigTemplate('deletedArticle.php', [
                'request' => $request->getParams()[0]
                ]);
        } else {
            $message = 'Désoler, mais vous ne pouvez pas accéder à cette page';

            (new TemplateLoader)->twigTemplate('message.php', [
                'message' => $message
                ]);
        }
    }
}
