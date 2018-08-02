<?php 

function postEmailReconfirmation()
{
	$email = htmlspecialchars($_POST['email']);
    $previousEmail = htmlspecialchars($_POST['previousEmail']);

    $req = confirmation($previousEmail);
    $result = $req->fetch();

    $key = $result['confirmation_key'];
	$confirmation = $result['confirmation'];
    $id = $result['id'];

    if($email != $previousEmail) {
        updateEmail($id, $email);
    }

	if($confirmation == 1) {
    	$message = 'votre compte est déjà confirmé, veuillez attendre qu\'un administrateur valide votre compte';
    	loadTemplate('message.php', $message);
	} elseif(!empty($key)) {
        $to = $email; 

        $subject = 'Confirmation de votre compte';
 
        $message = 'bienvenue sur mon blog professionnel,

        Pour activer votre compte, veuillez cliquer sur le lien ci dessous ou copier/coller dans votre navigateur internet.

        http://projetCinq/index.php/accountConfirmation?activation='.urlencode($email). '&cle='.urlencode($key).'



        --------------
        Ceci est un email automatique, Merci de ne pas y répondre';

        sendEmail($to, $subject, $message);

        loadTemplate('postRegistration.php', $email);
	} else {
		$message = "desoler, le message ne peut pas être ré-envoyé. Contacter un administrateur du site via le formulaire de contact sur la page d'accueil";
		loadTemplate('message.php', $message);
	}


}