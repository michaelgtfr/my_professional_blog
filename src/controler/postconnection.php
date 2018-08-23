<?php

require __DIR__.'./../../src/domaine/repository/requeteAdministration.php';

function postConnection()
{
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $resultat = userRecovery($email);

    $PasswordCorrect = password_verify($password, $resultat['password']);

    if(!$resultat) {
        $message = 'Desolé, mais votre mot de passe ou identifiant est incorrect !';
        loadTemplate('message.php', $message);
    } elseif($resultat['confirmation'] == 0) {
        $message = 'Desolé, mais votre compte n\'est pas confirmer veuillez le confirmer en cliquant sur email envoyer dans votre boite email';
        loadTemplate('message.php', $message);
    }elseif ($resultat['validation'] == 0) {
        $message = 'Desolé, mais votre compte n\'est pas encore valider, un administrateur doit valider votre compte pour pourvoir l\'utiliser';
        loadTemplate('message.php', $message);
    } else {
	    if($PasswordCorrect) {
		    $_SESSION['id'] = $resultat['id'];
		    $_SESSION['email'] = $resultat['email'];
            $_SESSION['role'] = $resultat['role'];
            dashboard($_SESSION['id']);
   	    } else {
		    $message = 'Desolé, mais votre mot de passe ou identifiant est incorrect !';
            loadTemplate('message.php', $message);
	    }
    }
}