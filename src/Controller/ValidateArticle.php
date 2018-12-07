<?php
namespace MyModule\controller;

use MyApp\TemplateLoader;
use MyApp\HTTP\HTTPRequest;
use MyModule\service\SendEmail;
use MyModule\domaine\repository\ArticleManagement;
use MyModule\entities\Items;

/**
*Class allowing the validation of an article by an administrator.
*/
class ValidateArticle
{
    private $templateLoader;

    public function __construct()
    {
        $this->templateLoader = new TemplateLoader();
    }

    public function __invoke(HTTPRequest $request)
    {
        if ($request->getSession('token') == $request->getGET('token')) {
            $data = new ArticleManagement();
            $email = $data->userArticle($request->getGET('id'));

            $content = $this->templateLoader->generate('validateArticle.php', []);

            new sendEmail($email->getEmail(), 'Validation de votre article', $content);

            $data->reqValidateArticle($request->getGET('id'));
            $reqArticle = $data->noValidateArticles();

            $message = 'Article validé, vous pouvez continué à valider des articles.';

            return $this->templateLoader->TwigTemplate('articleManagement.php', [
                    'items' => $reqArticle,
                    'request' => $request,
                    'message' => $message
                    ]);
        }
        $message = 'Désolé! un erreur est survenu veuillez réessayer ultérieurement ou envoyer un message à un administrateur';

        $this->templateLoader->twigTemplate('message.php', [
            'message' => $message
            ]);
    }
}
