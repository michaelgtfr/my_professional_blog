<?php
namespace MyModule\controller;

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
        if ($request->getSession('token') == $request->getGET('token')) {
            $user = new ArticleManagement;
            $email = $user->userArticle($request->getGET('id'));
            $content = $this->templateLoader->generate('deleteArticle.php', []);

            new SendEmail($email->getEmail(), 'Refus de votre article', $content);

            $user->reqDeleteArticle($request->getGET('id'));
            $reqArticle = $user->noValidateArticles();

            $message = 'Article supprimer, vous pouvez continué à supprimer des articles.';

            $this->templateLoader->twigTemplate('articleManagement.php', [
                                'items' => $reqArticle,
                                'request' => $request,
                                'message' => $message
                                ]);
        } else {
            $message = 'Désolé! un erreur est survenu veuillez réessayer ultérieurement ou envoyer un message à un administrateur';

            (new TemplateLoader)->twigTemplate('message.php', [
                'message' => $message
                ]);
        }
    }
}
