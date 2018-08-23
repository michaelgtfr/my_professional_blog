<?php

function userAccountManagement()
{
	if(isset($_SESSION['id']) && isset($_SESSION['email']) && $_SESSION['role'] == 'administrateur') {
	    $return = userAccountNoValidate();
	    $message = 'Vous voici dans la partie validation des comptes éditeurs. Vous pouvez choisir si oui ou non il peut faire partie des éditeur du site.';
	    loadTemplate('userAccountManagement.php', array($return, $message));
    } else {
    	$message = 'Désoler vous ne pouvez pas accéder à cette page';
    	loadTemplate('message.php', $message);
    }
}

function userAccountValidate($params)
{
    reqUserAccountValidate($params[0]);
    $email = reqUserEmailAccount($params[0]);
	$to = $email; 
    $subject = 'Validation de votre compte utilisateur';
    $message = 'Félicitation! votre compte a été valider,

        vous pouvez dès à présent vous connectez a votre compte utilisateur en cliquant ou en copiant l\'url dans votre navigateur http://projetcinq/ .



        --------------
        Ceci est un email automatique, Merci de ne pas y répondre';

    sendEmail($to, $subject, $message);
    $return = userAccountNoValidate();
    $message = 'Félicitation! vous avez validé le compte utilisateur. Il recevera un message lui disant qu\'il peut se connecter. Vous pouvez continué a valider des comptes utilisateurs si vous le voulez';
    loadTemplate('userAccountManagement.php', array($return, $message));
}

function userAccountReject($params)
{
	$emailAndPhoto = reqUserEmailAndPhotoAccount($params[0]);
	//email a envoyer
	$to = $email; 
    $subject = 'Désoler, refus de validation votre compte utilisateur';
    $message = 'Désoler! votre compte a été refuser,

        vous pouvez n\'est en moins continuer à regarder et commenter les articles en cliquant ou en copiant l\'url dans votre navigateur http://projetcinq/ .



        --------------
        Ceci est un email automatique, Merci de ne pas y répondre';

    sendEmail($to, $subject, $message);
	reqUserAccountReject($params[0]);
	unlink(__DIR__.'./../../public/img/avatar/'.$emailAndPhoto['photo']); //delete the photo in the avatar folder
    $return = userAccountNoValidate();
    $message = 'Le compte à été supprimé. Il recevera un message lui disant que sont compte à été refusé. Vous pouvez continué à juger des comptes utilisateurs si vous le voulez';
    loadTemplate('userAccountManagement.php', array($return, $message));
}