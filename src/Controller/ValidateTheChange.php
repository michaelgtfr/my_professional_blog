<?php
namespace MyModule\controller;

use MyApp\TemplateLoader;
use MyApp\HTTP\HTTPRequest;
use MyModule\domaine\repository\UpdatePostManagement;
use MyModule\domaine\repository\PictureManagement;
use MyModule\domaine\repository\ArticleManagement;
use MyModule\entities\Picture;
use MyModule\entities\Items;

/**
*Class to modify an already validated article.
*/
class ValidateTheChange
{
    public function __invoke(HTTPRequest $request)
    {
        if ($request->getGET('token') == $request->getSession('token')) {
            //Recovered the data changes and Saving data change instead of validated information
            $postUpdate = new UpdatePostManagement;
            $newData = $postUpdate->validateTheModify($request->getGET('id'));

            (new ArticleManagement)->modifyTheDonnees($newData->getAuthor(), $newData->getTitle(), $newData->getChapo(), $newData->getContent(), $newData->getIdBlogPost());

            //Recovered the ID of the photo to check if the photo is the same for the posted article
            $data = new PictureManagement;
            $verification = $data->recoveryPicture($request->getGET('id'));
            if ($verification->getBlogPostsIdPicture() == null) {
                //Recovered the name and the extention to delete the file in the IMG folder
                $return = $data->recoveryNameExtentionPicture($newData->getIdBlogPost());
                unlink(__DIR__.'./../../public/img/imgPost/'.$return->getNamePicture().'.'.$return->getExtentionPicture());
                $data->reqDeletedPicture($newData->getIdBlogPost());
            }
            //Modifies the changed photo's attribute and removes the attributes in Blog_post_update.
            $data->reqModifyPicture($newData->getIdBlogPost(), $request->getGET('id'));

            $postUpdate->deleteTheModify($request->getGET('id'));

            $message = 'L\'article a été modifié, vous pouvez continuer à juger les autres articles modifiés.';

            $reqArticle = $postUpdate->recoverModifyArticle();

            (new TemplateLoader)->twigTemplate('validateChangeArticle.php', [
                'request' => $request,
                'article' => $reqArticle,
                'message' => $message
                ]);
        } else {
            $message = 'désolé! mais votre requête n\a pas aboutie, veuillez réessayer ultérieurement ou envoyer un email à un administrateur.';

            (new TemplateLoader)->twigTemplate('message', [
                'message' => $message
                ]);
        }
    }
}
