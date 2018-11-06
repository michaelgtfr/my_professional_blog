<?php

namespace MyModule\Controller;

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
class validateTheChange
{
    public function __invoke(HTTPRequest $request)
    {
        //Recovered the data changes and Saving data change instead of validated information
        $postUpdate = new UpdatePostManagement;
	    $newData = $postUpdate->validateTheModify($request->getParams()[0]);

	    new ArticleManagement->modifyTheDonnees($newData);

        //Recovered the ID of the photo to check if the photo is the same for the posted article
        $data = new PictureManagement;
        $verification = $data->recoveryPicture($request->getParams()[0]); 
        if($verification->blogPostsIdPicture() == NULL) {
            //Recovered the name and the extention to delete the file in the IMG folder
            $return = $data->recoveryNameExtentionPicture($newData->getIdBlogPost());
            unlink(__DIR__.'./../../public/img/imgPost/'.$return->getName().'.'.$return->getExtention());
            $data->reqDeletedPicture($newData->getIdBlogPost());
        }
        //Modifies the changed photo's attribute and removes the attributes in Blog_post_update.
        $data->reqModifyPicture($newData->getIdBlogPost(), $request->getParams()[0]);

        $postUpdate->deleteTheModify($request->getParams()[0]);

        $request->addSession('message', 'L\'article a été modifié, vous pouvez continuer à juger les autres articles modifié.');

        $reqArticle = $postUpdate->recoverModifyArticle();

	    echo (new TemplateLoader)->generate('validateChangeArticle.php', [
            'request' => $request,
            'article' => $reqArticle
            ]); 
    }
}
