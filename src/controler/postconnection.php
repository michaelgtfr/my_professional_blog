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
    } else {
	    if($PasswordCorrect) {
		    $_SESSION['id'] = $resultat['id'];
		    $_SESSION['email'] = $resultat['email'];
		    echo'vous etes connecter';
   	    } else {
		    echo'Desolé, mais votre mot de passe ou identifiant est incorrect !';
	    }
    }
}