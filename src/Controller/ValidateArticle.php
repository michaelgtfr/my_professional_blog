<?php

namespace MyModule\Controller;

use MyApp\TemplateLoader;
use MyApp\HTTP\HTTPRequest;
use MyModule\fonction\SendEmail;
use MyModule\domaine\repository\ArticleManagement;
use MyModule\entities\Items;

/**
*Class allowing the validation of an article by an administrator.
*/
class validateArticle
{
    public function __invoke(HTTPResquest $request)
{
        $data = new ArticleManagement;
        $email = $data->userArticle($request->getParams()[0]);

        $content = $this->templateLoader->generate('validateArticle.php', [])

        new sendEmail($email->getEmail(), 'Validation de votre article', $content);

	    $data->reqValidateArticle($request->getParams()[0]);
        $reqArticle = $data->noValidateArticles();

        $request->addSession('message', 'Article validé, vous pouvez continué à valider des articles.');

        echo (new TemplateLoader)->generate('articleManagement.php', [
            'article' => $reqArticle,
            'request' => $request
            ]);
    }
}
