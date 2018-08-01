<?php  

function postRegistration()
{
	$name = htmlspecialchars($_POST['name']);
	$firstname = htmlspecialchars($_POST['firstname']);
	$email = htmlspecialchars($_POST['email']);
	$passwordOne = htmlspecialchars($_POST['passwordOne']);
	$passwordTwo = htmlspecialchars($_POST['passwordTwo']);
	$presentation = htmlspecialchars($_POST['presentation']);

    $maxsize = 1048576;
    $extensionAllowed = array('jpg', 'jpeg', 'png');//savoir si l'extention est autorisé
    $extensionUpload = strtolower(substr(strrchr($_FILES['photo']['name'], '.'), 1));
    $req = userRecovery($email);
    $resultat = $req->fetch();

    if(!empty($resultat)) {//verifie si un compte existe
        echo 'desoler mais ce compte existe deja';
    } elseif($_FILES['photo']['error'] > 0) {//savoir si il y a une erreur upload
       echo 'erreur lors du transfert';
    } elseif($_FILES['photo']['size'] > $maxsize) {//savoir si le fichier est plus lourd que la taille maximal
    	echo 'le fichier est trop gros';
    } elseif(!in_array($extensionUpload, $extensionAllowed)) {
        echo'l\'extention du fichier n\'est pas autorisé';
    } elseif($passwordOne != $passwordTwo) {// verification du mot de passe
    	echo'les mots de passe sont différents';
    } else {
    //renommage de la photo
    $dateAvatar = date('Y_m_d_H_i_s');
    $namePhoto = "{$dateAvatar}.{$extensionUpload}";
    $transfertFile ="img\avatar\\$namePhoto";//transfert de la photo dans le dossier avatar
    $result = move_uploaded_file($_FILES['photo']['tmp_name'], $transfertFile);

    //hashage du mot de passe
    $passwordHash = password_hash($_POST['passwordOne'], PASSWORD_DEFAULT);

    //générateur de clé

    $key = md5(microtime(TRUE)*100000);

    //enregistrement
    $registration = registration($name, $firstname, $email, $namePhoto, $presentation, $passwordHash, $key);

    //preparation et envoie de l'email
    ini_set('SMTP','smtp.free.fr');
    ini_set('sendmail_from', 'mickdu62200@gmail.com');

    $to = $email; 

    $subject = 'Confirmation de votre compte';
 
    $message = 'bienvenue sur mon blog professionnel,

    Pour activer votre compte, veuillez cliquer sur le lien ci dessous ou copier/coller dans votre navigateur internet.

    http://projetCinq/index.php/accountConfirmation?activation='.urlencode($email). '&cle='.urlencode($key).'



    --------------
    Ceci est un email automatique, Merci de ne pas y répondre';

    mail($to, $subject, $message);

    loadTemplate('postRegistration.php', $email);
    }
}
