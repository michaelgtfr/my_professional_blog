<?php

function postResetPassword()
{
	$email = htmlspecialchars($_POST['email']);
	$name = htmlspecialchars($_POST['name']);
	$passwordOne = htmlspecialchars($_POST['passwordOne']);
	$passwordTwo = htmlspecialchars($_POST['passwordTwo']);

	$result = verificationElement($email, $name);

	if (empty($result)) {
		$message = "désolé, mais votre compte est introuvable veuillez prévénir un administrateur via le formulaire de contact pour trouver une solution à votre problème.";
		loadTemplate('message.php', $message);
	} elseif($passwordOne != $passwordTwo) {
		echo 'desoler vos mot de passe sont différents';
		loadTemplate('resetPassword.php', '');
	} else {
		$key = $result['confirmation_key'];
        $password = password_hash($passwordOne, PASSWORD_DEFAULT);
        changePassword($email, $password);

        $to = $email; 

        $subject = 'Confirmation de votre modification de mot de passe';
 
        $message = 'bienvenue sur mon blog professionnel,

        Pour activer votre compte, veuillez cliquer sur le lien ci dessous ou copier/coller dans votre navigateur internet.

        http://projetCinq/index.php/accountConfirmation?activation='.urlencode($email). '&cle='.urlencode($key).'



        --------------
        Ceci est un email automatique, Merci de ne pas y répondre';

        sendEmail($to, $subject, $message);
        
        $message = 'Félicitation! votre mot de passe à été modifié, vous pourrez utiliser votre compte aprés la validation de votre nouveau mot de passe envoyé sur votre adresse email';
        loadTemplate('postRegistration.php', array($email, $message));
	}


}