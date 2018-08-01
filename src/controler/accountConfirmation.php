<?php

function accountConfirmation($params)
{

	$email = $_GET['activation'];
	$confirmationKey = $_GET['cle'];

	$req = Confirmation($email);
	$result = $req->fetch();
    
	$cleOfAccount = $result['confirmation_key'];
	$confirmation = $result['confirmation'];
	if($confirmation == 1) {
    	$message = 'votre compte est deja actif';
	} elseif($cleOfAccount == $confirmationKey) {
    	$req = validateConfirmation($email);
    	$message = 'votre compte a été confirmé, un administrateur doit le valider pour pouvoir utiliser votre compte, vous receveré un message de confirmation des que celle-ci sera fait.';
    } else {
    	$message = 'Erreur,votre compte ne peut pas etre active';
    }
    loadTemplate('message.php',$message);
}