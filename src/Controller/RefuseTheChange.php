<?php
namespace MyModule\controller;

use MyApp\HTTP\HTTPRequest;
use MyApp\TemplateLoader;
use MyModule\domaine\repository\UpdatePostManagement;
use MyModule\domaine\repository\PictureManagement;
use MyModule\entities\User;
use MyModule\entities\Picture;

/**
*Class to refuse the modification of an article.
*/
class RefuseTheChange
{
    public function __invoke(HTTPRequest $request)
    {
        if ($request->getGET('token') == $request->getSession('token')) {
            $data = new UpdatePostManagement;
            // Deletes the data in blog_post_update
            $data->deleteTheModify($request->getGET('id'));
            // Recovered the ID of the photo to check if the photo is the same for the posted article
            $management = new PictureManagement;
            $verification = $management->recoveryPicture($request->getGET('id'));
            
            //If it is not the same one deletes otherwise one modifies
            if (empty($verification->getBlogPostsIdPicture())) {
                //delete the file in the IMG folder
                unlink(__DIR__.'./../../public/img/imgPost/'.$verification->getName().'.'.$verification->getExtention());
                $management->deletePicture($request->getGET('id'));
            } else {
                $management->modifyPicture($request->getGET('id'));
            }
            $reqArticle = $data->recoverModifyArticle();
            $message = 'L\'article à été supprimé, vous pouvez continuer à juger les autres articles modifié.';

            echo (new TemplateLoader)->twigTemplate('validateChangeArticle.php', [
                'request' => $request,
                'article' => $reqArticle,
                'message' => $message
                ]);
        } else {
            $message = 'désolé! mais votre requête n\a pas aboutie, veuillez réessayer ultérieurement ou envoyer un email à un administrateur.';

            $this->templateLoader->twigTemplate('message', [
                'message' => $message
                ]);
        }
    }
}
