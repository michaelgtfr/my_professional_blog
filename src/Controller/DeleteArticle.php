<?php

namespace MyModule\Controller;

use MyApp\HTTP\HTTPRequest;
use MyApp\TemplateLoader;
use MyModule\domaine\repository\ArticleManagement;
use MyModule\entities\Items;
use MyModule\fonction\SendEmail;

/**
*Class allowing the deleted because the reject of the validate of the article non validate
*/
class DeleteArticle
{
	private $templateLoader;

    public function __construct()
    {
        $this->templateLoader = new TemplateLoader();
    }

	public function __invoke(HTTPRequest $request)
	{
		$user = new ArticleManagement;
		$email = $user->userArticle($request->getParams()[0]);

		$content = $this->templateLoader->generate('deleteArticle.php', []);

    	new SendEmail($email, 'Refus de votre article', $content);

		$user->reqDeleteArticle($request->getParams()[0]);
		$reqArticle = $user->noValidateArticles();

		$request->addSession('message', 'Article supprimer, vous pouvez continué à supprimer des articles.');

		echo $this->templateLoader->generate('articleManagement.php', [
								'article' => $reqArticle,
								'request' => $request
								]);
	}
}

