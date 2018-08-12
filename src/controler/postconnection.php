<?php

require __DIR__.'./../../src/domaine/repository/requeteAdministration.php';

function postConnection()
{
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $req = userRecovery($email);
    $resultat = $req->fetch();

    $PasswordCorrect = password_verify($password, $resultat['password']);

    if(!$resultat) {
        echo'Desolé, mais votre mot de passe ou identifiant est incorrect !';
    } elseif($resultat['confirmation'] == 0) {
        echo 'Desolé, mais votre compte n\'est pas confirmer veuillez le confirmer en cliquant sur email envoyer dans votre boite email';
    }elseif ($resultat['validation'] == 0) {
        echo 'Desolé, mais votre compte n\'est pas encore valider, un administrateur doit valider votre compte pour pourvoir l\'utiliser';
    } else {
	    if($PasswordCorrect) {
		    $_SESSION['id'] = $resultat['id'];
		    $_SESSION['email'] = $resultat['email'];
            $_SESSION['role'] = $resultat['role'];
            dashboard($_SESSION['id']);
   	    } else {
		    echo'Desolé, mais votre mot de passe ou identifiant est incorrect !';
	    }
    }
}