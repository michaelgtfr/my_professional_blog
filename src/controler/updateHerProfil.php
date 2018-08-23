<?php

function updateHerProfil($params)
{
	if($_SESSION['id'] == $params[0]) {
        $return = userAccount($params[0]);
        loadtemplate('updateHerProfil.php', $return);
	} else {
		$message = 'Désolé! mais vous ne pouvez pas accéder à cette page';
		loadtemplate('message.php', $message);
	}
}

function postUpdateHerProfil()
{
	if($_SESSION['id'] && $_SESSION['email']) {
        $name = htmlspecialchars($_POST['name']);
        $firstName = htmlspecialchars($_POST['firstName']);
        $email = htmlspecialchars($_POST['email']);
        $presentation = htmlspecialchars($_POST['presentation']);


        if($_FILES['photo']['size']> 0) {
        	$maxsize = 1048576;
            $extensionAllowed = array('jpg', 'jpeg', 'png');//savoir si l'extention est autorisé
            $extensionUpload = strtolower(substr(strrchr($_FILES['photo']['name'], '.'), 1));
            if($_FILES['photo']['error'] > 0) {//savoir si il y a une erreur upload
            echo 'erreur lors du transfert';
            } elseif($_FILES['photo']['size'] > $maxsize) {//savoir si le fichier est plus lourd que la taille maximal
    	    echo 'le fichier est trop gros';
            } elseif(!in_array($extensionUpload, $extensionAllowed)) {
            echo'l\'extention du fichier n\'est pas autorisé';
            } else {
        	unlink(__DIR__.'./../../public/img/avatar/'. $_POST['avatar']);
        	$dateAvatar = date('Y_m_d_H_i_s');
            $namePhoto = "{$dateAvatar}.{$extensionUpload}";
            $transfertFile ="img\avatar\\$namePhoto";//transfert de la photo dans le dossier avatar
            $result = move_uploaded_file($_FILES['photo']['tmp_name'], $transfertFile);
            reqUpdateUserAccount($_SESSION['id'] ,$name, $firstName, $email, $presentation, $namePhoto);
            }
        } else {
        	reqUpdateUserAccount($_SESSION['id'] ,$name, $firstName, $email, $presentation, $_POST['avatar']);
        }
    $message = 'Félicitation! votre modification a été modifié avec succés.';
    loadtemplate('message.php', $message);
	} else {
		$message = 'Désolé! mais une erreur est survenue a votre demande veuillez réessayer ultérieurement';
		loadtemplate('message.php', $message);
	}
}
