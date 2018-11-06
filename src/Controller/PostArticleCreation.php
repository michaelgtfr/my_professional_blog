<?php

namespace MyModule\Controller;

use MyApp\HTTP\HTTPRequest;
use MyApp\TemplateLoader;
use MyModule\entities\BlogPosts;
use MyModule\domaine\repository\ArticleManagement;
use MyModule\domaine\repository\PictureManagement;

/**
*Class allowing verification and registration of an article.
*/
class PostArticleCreation
{
    public function __invoke(HTTPRequest $request)
    {
	    $maxsize = 2097152;
	    $extensionAllowed = array('jpg', 'jpeg', 'png');//savoir si l'extention est autorisé
        $extensionUpload = strtolower(substr(strrchr($request->getFILES('photo', 'name'), '.'), 1));

        if($request->getFILES('photo', 'error') > 0) {
    	   $request->addSession('message' 'erreur lors du transfert');
        } elseif ($request->getFILES('photo', 'size') > $maxsize) {
            $request->addSession('message', 'desoler mais votre fichier est trop gros');
        } elseif(!in_array($extensionUpload, $extensionAllowed)) {
            $request->addSession('message', 'l\'extention du fichier n\'est pas autorisé');
        } else {
    	    $datePicture = date('Y_m_d_H_i_s');
            $namePhoto = "{$datePicture}.{$extensionUpload}";
            $transfertFile ="img\imgPost\\$namePhoto";
            $result = move_uploaded_file($request->getFILES('photo', 'tmp_name'), $transfertFile);

            $data = new ArticleManagement;
            $data->addArticle($request->getPOST('id'), $request->getPOST('title'), $request->getPOST('chapo'), $request->getPOST('content'));
            $idArticle = $data->recoveryIdArticle($request->getPOST('title'), $request->getPOST('chapo'));
            (new PictureManagement)->photoJoin($idArticle->getId(), $datePicture, $extensionUpload, $request->getPOST('description'));

            $request->addSession('message', 'Félicitation! votre article a été créé. Il sera visible dès qu\'un administrateur aura valider cet article.');
        }
        echo (new TemplateLoader)->generate('message.php', $request);
    }
}
