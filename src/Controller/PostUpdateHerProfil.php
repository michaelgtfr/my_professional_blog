<?php

namespace MyModule\Controller;

use MyApp\HTTP\HTTPRequest;
use MyApp\TemplateLoader;
use MyModule\domaine\repository\UserManagement;

/**
*Class for saving changes of the profil.
*/
class PostUpdateHerProfil
{

    public function __invoke(HTTPRequest $request)
    {
	    if ($request->getSession('id') && $request->getSession('email')) {

            if ($request->getFILES('photo', 'size') > 0) {
                $extensionAllowed = array('jpg', 'jpeg', 'png');
                $extensionUpload = strtolower(substr(strrchr($request->getFILES('photo', 'name'), '.'), 1));

                if ($request->getFILES('photo', 'error') > 0) {
                    $request->addSession('message', 'erreur lors du transfert');
                } elseif ($request->getFILES('photo', 'size') > $request->getPOST('maxsize')) {
    	            $request->addSession('message', 'le fichier est trop gros');
                } elseif (!in_array($extensionUpload, $extensionAllowed)) {
                    $request->addSession('message', 'l\'extention du fichier n\'est pas autorisé');
                } else {
        	        unlink(__DIR__.'./../../public/img/avatar/'. $request->getPOST('avatar'));
        	        $dateAvatar = date('Y_m_d_H_i_s');
                    $namePhoto = "{$dateAvatar}.{$extensionUpload}";
                    $transfertFile ="img\avatar\\$namePhoto";
                    $result = move_uploaded_file($request->getFILES('photo', 'tmp_name'), $transfertFile);

                    (new UserManagement)->reqUpdateUserAccount($request->getSession('id') , $request->getPOST('name'), $request->getPOST('firstName'), $request->getPOST('email'), $request->getPOST('presentation'), $request->getPOST('namePhoto'));

                    $request->addSession('message', 'Félicitation! votre modification a été modifié avec succés.');
                }
            } else {
        	    (new UserManagement)->reqUpdateUserAccount($request->getSession('id') , $request->getPOST('name'), $request->getPOST('firstName'), $request->getPOST('email'), $request->getPOST('presentation'), $request->getPOST('avatar'));

                $request->addSession('message', 'Félicitation! votre modification a été enregistré avec succés.');
            }
            echo (new TemplateLoader)->generate('message.php', $request);
	    } else {
		    $request->addSession('message', 'Désolé! mais une erreur est survenue a votre demande veuillez réessayer ultérieurement');

		    echo (new TemplateLoader)->generate('message.php', $request);
	    }
    }
}
