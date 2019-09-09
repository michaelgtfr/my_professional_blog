<?php
namespace MyModule\controller;

use MyModule\domaine\repository\UpdatePostManagement;
use MyApp\TemplateLoader;
use MyApp\HTTP\HTTPRequest;

/**
*Class allowing the display of modified articles.
*/
class ValidateChangeArticle
{
    public function __invoke(HTTPRequest $request)
    {
        $reqArticle = (new UpdatePostManagement)->recoverModifyArticle();

        $message = 'Vous étes sur la partie modification d\'un article deja validé. Vous pouvez choisir si oui ou non, il peut modifier l\'article déja présent sur le blog.';

        (new TemplateLoader)->twigTemplate('validateChangeArticle.php', [
            'request' => $request,
            'article' => $reqArticle,
            'message' => $message
            ]);
    }
}
