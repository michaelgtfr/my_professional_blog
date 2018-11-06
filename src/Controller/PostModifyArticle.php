<?php

namespace MyModule\Controller;

use MyApp\HTTP\HTTPRequest;
use MyApp\TemplateLoader;
use MyModule\domaine\repository\UpdatePostManagement;
use MyModule\domaine\repository\PictureManagement;
use MyModule\entities\User;

/**
*Class to check and save as possible a previously validated article.
*/
class PostModifyArticle
{
    public function __invoke(HTTPRequest $request)
    {
	    if (!empty($request->getSession('id')) && !empty($request->getSession('email'))) {
		    $idPostUpdate = reqChangeRegister($request->getPOST('blogPost'), $request->getPOST('title'), $request->getPOST('chapo'), $request->getPOST('content'), $request->getPOST('author'));
            if($request->getFILES('picture', 'size') > 0 ) {
                $maxsize = 2097152;
	            $extensionAllowed = array('jpg', 'jpeg', 'png');
                $extensionUpload = strtolower(substr(strrchr($request->getFILES('picture', 'name'), '.'), 1));
                if($request->getFILES('picture', 'error') > 0) {
    	            $request->addSession('message', 'erreur lors du transfert');
                } elseif ($request->getFILES('picture', 'size') > $maxsize) {
                    $request->addSession('message', 'desoler mais votre fichier est trop gros');
                } elseif(!in_array($extensionUpload, $extensionAllowed)) {
                    $request->addSession('message', 'l\'extention du fichier n\'est pas autorisé');
                } else {
    	            $datePicture = date('Y_m_d_H_i_s');
                    $namePhoto = "{$datePicture}.{$extensionUpload}";
                    $transfertFile ="img\imgPost\\$namePhoto";
                    $result = move_uploaded_file($request->getFILES('picture', 'tmp_name'), $transfertFile);
                    new PictureManagement->reqAddPicture($idPostUpdate->getId(), $request->getPOST('description'), $datePicture, $extensionUpload);

                    $request->addSession('message', 'Félicitation, votre article a été enregistré comme modification. Il modifiera l\'article voulu à la validation d\'un administrateur');
                }
            } else {
            new PictureManagement->reqAddIdPicture($request->getPOST('blogPost'), $idPostUpdate->getId());

            $request->addSession('message', 'Félicitation, votre article a été enregistré comme modification. Il modifiera l\'article voulu à la validation d\'un administrateur');
            } 
	    } else {
		    $request->addSession('message', 'Désoler, vous ne pouvez pas accéder à cette page');
	    }
        echo (new TemplateLoader)->generate('message.php', $request);
    }
}
