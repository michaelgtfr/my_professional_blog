<?php

function modifyArticle($params)
{
	if(isset($_SESSION['id']) && ($_SESSION['email'])) {
	    $data = articleToBeAmended($params[0]);
	    loadTemplate('modifyArticle.php', $data);
    } else {
    	$message = 'désoler, vous ne pouvez pas accéder à cette page';
    	loadTemplate('message.php', $message);
    }
}

function postModifyArticle()
{
	if(isset($_SESSION['id']) && isset($_SESSION['email'])) {
        $title = htmlspecialchars($_POST['title']);
        $chapo = htmlspecialchars($_POST['chapo']);
        $content = htmlspecialchars($_POST['content']);
        $description = htmlspecialchars($_POST['description']);
        $blogPost = htmlspecialchars($_POST['blogPost']);
        $author = htmlspecialchars($_POST['author']);
//enregistement de l'article modifié et recuperation de son id
		$idPostUpdate = reqChangeRegister($blogPost, $title, $chapo, $content, $author);
		$idPostUpdate = $idPostUpdate[0];
        if($_FILES['picture']['size'] > 0 ) { //si une photo est envoyé
            $maxsize = 2097152;
	        $extensionAllowed = array('jpg', 'jpeg', 'png');//savoir si l'extention est autorisé
            $extensionUpload = strtolower(substr(strrchr($_FILES['picture']['name'], '.'), 1));
            if($_FILES['picture']['error'] > 0) {
    	        echo 'erreur lors du transfert';
            } elseif ($_FILES['picture']['size'] > $maxsize) {
                echo 'desoler mais votre fichier est trop gros';
            } elseif(!in_array($extensionUpload, $extensionAllowed)) {
                echo'l\'extention du fichier n\'est pas autorisé';
            } else {
    	        //changement de nom et transfert de la photo dans le dossier imgPost
    	        $datePicture = date('Y_m_d_H_i_s');
                $namePhoto = "{$datePicture}.{$extensionUpload}";
                $transfertFile ="img\imgPost\\$namePhoto";
                $result = move_uploaded_file($_FILES['picture']['tmp_name'], $transfertFile);
                reqAddPicture($idPostUpdate, $description, $datePicture, $extensionUpload);
            }
        } else { //sinon mettre id de l'article modifier sur la case update de la photo de l'ancienne article
            reqAddIdPicture($blogPost, $idPostUpdate);
        }

		$message = 'Félicitation, votre article a été enregistré comme modification. Il modifiera l\'article voulu à la validation d\'un administrateur';
		loadTemplate('message.php', $message); 
	} else {
		$message = 'Désoler, vous ne pouvez pas accéder à cette page';
		loadTemplate('message.php', $message);
	}
}
