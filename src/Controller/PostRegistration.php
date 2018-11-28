<?php
namespace MyModule\controller;

use MyModule\fonction\SendEmail;
use MyApp\HTTP\HTTPRequest;
use MyApp\TemplateLoader;
use MyModule\entities\User;
use MyModule\domaine\repository\UserManagement;

/**
*Class allowing the creation of a user account.
*/
class PostRegistration
{
    private $templateLoader;

    public function __construct()
    {
        $this->templateLoader = new TemplateLoader();
    }

    public function __invoke(HTTPRequest $request)
    {
        $maxsize = 1048576;
        $extensionAllowed = array('jpg', 'jpeg', 'png');
        $extensionUpload = strtolower(substr(strrchr($request->getFILES('photo', 'name'), '.'), 1));
        $resultat = (new UserManagement)->userRecovery($request->getPOST('email'));

        if (!empty($resultat)) {
            $message = 'Desoler mais ce compte existe deja';
        } elseif ($request->getFILES('photo', 'error') > 0) {
            $message = 'Erreur lors du transfert';
        } elseif ($request->getFILES('photo', 'size') > $maxsize) {
            $message = 'Le fichier est trop gros';
        } elseif (!in_array($extensionUpload, $extensionAllowed)) {
            $message = 'L\'extention du fichier n\'est pas autorisé';
        } elseif ($request->getPOST('passwordOne') != $request->getPOST('passwordTwo')) {
            $message = 'Les mots de passe sont différents';
        } else {
            $dateAvatar = date('Y_m_d_H_i_s');
            $namePhoto = "{$dateAvatar}.{$extensionUpload}";
            $transfertFile ="img\avatar\\$namePhoto";

            $result = move_uploaded_file($request->getFILES('photo', 'tmp_name'), $transfertFile);

            $passwordHash = password_hash($request->getPOST('passwordOne'), PASSWORD_DEFAULT);

            $key = md5(microtime(true)*100000);

            $resultat = (new UserManagement)->registration($request->getPOST('name'), $request->getPOST('firstname'), $request->getPOST('email'), $namePhoto, $request->getPOST('presentation'), $passwordHash, $key);

            $request->addSession('key', $key);
            
            $content = $this->templateLoader->generate('messageOfConfirmation.php', [
                'email' => $request->getPOST('email'),
                'key' => $request->getSession('key')]);
            new SendEmail($request->getPOST('email'), 'Confirmation de votre compte', $content);

            $message = 'Félicitation, votre inscription est réussie il vous reste à le valider pour cela, cliquer sur le lien envoyé sur votre adresse email est aprés votre confirmation un administrateur doit approuver votre inscription';
        }
        $this->templateLoader->twigTemplate('postRegistration.php', [
            'request' => $request,
            'message' => $message
            ]);
    }
}
