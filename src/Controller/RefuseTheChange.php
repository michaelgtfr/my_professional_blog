<?php

namespace MyModule\Controller;

use MyApp\HTTP\HTTPRequest;
use MyApp\TemplateLoader;
use MyModule\domaine\repository\UpdatePostManagement;
use MyModule\domaine\repository\PictureManagement;
use MyModule\entities\User;
use MyModule\entities\Picture;

/**
*Class to refuse the modification of an article.
*/
class refuseTheChange
{
    public function __invoke(HTTPRequest $request)
    {
        $data = new UdpatePostManagement;
        // Deletes the data in blog_post_update
        $data->deleteTheModify($request->getParams()[0]);
        // Recovered the ID of the photo to check if the photo is the same for the posted article
        $verification = (new PictureManagement)->recoveryPicture($request->getParams()[0]);

        //If it is not the same one deletes otherwise one modifies
        if(empty($verification->getBlogPostIdPicture())) {
            //delete the file in the IMG folder
            unlink(__DIR__.'./../../public/img/imgPost/'.$verification->getName().'.'.$verification->getExtention());
            deletePicture($request->getParams()[0]);
        } else {
            modifyPicture($request->getParams()[0]);
        }
        $reqArticle = $data->recoverModifyArticle();
        $request->addSession('message', 'L\'article à été supprimé, vous pouvez continuer à juger les autres articles modifié.');
	    echo (new TemplateLoader)->generate('validateChangeArticle.php', [
            'request' => $request,
            'article' => $reqArticle
            ]);
    }
}
