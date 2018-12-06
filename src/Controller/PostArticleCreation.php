<?php
namespace MyModule\controller;

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
        if ($request->getSession('token') == $request->getPOST('token')) {
            $maxsize = 2097152;
            $extensionAllowed = array('jpg', 'jpeg', 'png');//savoir si l'extention est autorisé
            $extensionUpload = strtolower(substr(strrchr($request->getFILES('photo', 'name'), '.'), 1));

            if ($request->getFILES('photo', 'error') > 0) {
                $message = 'erreur lors du transfert';
            } elseif ($request->getFILES('photo', 'size') > $maxsize) {
                $message = 'desoler mais votre fichier est trop gros';
            } elseif (!in_array($extensionUpload, $extensionAllowed)) {
                $message = 'l\'extention du fichier n\'est pas autorisé';
            } else {
                $datePicture = date('Y_m_d_H_i_s');
                $namePhoto = "{$datePicture}.{$extensionUpload}";
                $transfertFile ="img\imgPost\\$namePhoto";
                move_uploaded_file($request->getFILES('photo', 'tmp_name'), $transfertFile);

                $data = new ArticleManagement;
                $data->addArticle($request->getPOST('id'), $request->getPOST('title'), $request->getPOST('chapo'), $request->getPOST('content'));
                $idArticle = $data->recoveryIdArticle($request->getPOST('title'), $request->getPOST('chapo'));
                (new PictureManagement)->photoJoin($idArticle->getId(), $datePicture, $extensionUpload, $request->getPOST('description'));

                $message = 'Félicitation! votre article a été créé. Il sera visible dès qu\'un administrateur aura valider cet article.';
            }
            return (new TemplateLoader)->twigTemplate('message.php', [
                'message' => $message
                ]);
        }
        $message = 'Désolé! un erreur est survenu veuillez réessayer ultérieurement ou envoyer un message à un administrateur';

        (new TemplateLoader)->twigTemplate('message.php', [
            'message' => $message
            ]);
    }
}
