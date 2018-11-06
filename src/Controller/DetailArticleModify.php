<?php

namespace MyModule\Controller;

use MyApp\HTTP\HTTPRequest;
use MyModule\domaine\repository\UpdatePostManagement;
use MyApp\TemplateLoader;
use MyModule\entities\Items;

/**
*Class to display the detail of the edited item.
*/
class DetailArticleModify
{
	public function __invoke(HTTPRequest $request)
	{
    	$data = (new UpdatePostManagement)->articleDetailModify($request->getParams()[0]);
    	echo (new TemplateLoader)->generate('articleDetailModify.php', $data);
	}
}
