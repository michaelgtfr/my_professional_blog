<?php

function contactForm($params)
{
	$name = htmlspecialchars($_POST['name']);
	$email = htmlspecialchars($_POST['email']);
	$message = htmlspecialchars($_POST['message']). '
  
	L\'email de la personne: ' . $email.'
	Date: Le ' .date('l j F \à Y H:i:s');

	if($params[0] == 1) {
	    $subject = 'Message de '.$name;
    } elseif($params[0] == 2) {
        $role = htmlspecialchars($_POST['role']);
        $subject = 'Message de '. $name .'[' . $role . ' du site]';
    }

    $to = 'michael.garret.france@gmail.com';
    sendEmail($to, $subject, $message);
    $messageSuccess = 'félicitation votre message à été envoyé sur l\'email administrateur';
    loadTemplate('message.php', $messageSuccess); 
}