<?php

namespace MyModule\Controller;

use MyModule\domaine\repository\UpdatePostManagement;
use MyModule\entities\Items;
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

	    $request->addSession('message', 'Vous étes sur la partie modification d\'un article deja validé. Vous pouvez choisir si oui ou non, il peut modifier l\'article déja présent sur le blog.');

	    echo (new TemplateLoader)->generate('validateChangeArticle.php', [
	    	'request' => $request,
	    	'article' => $reqArticle
	    	]);
    }
}
