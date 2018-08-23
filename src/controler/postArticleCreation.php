<?php

function postArticleCreation()
{
	$id = htmlspecialchars($_POST['id']);
	$title = htmlspecialchars($_POST['title']);
	$chapo = htmlspecialchars($_POST['chapo']);
	$content = htmlspecialchars($_POST['content']);
	$description = htmlspecialchars($_POST['description']);

	$maxsize = 2097152;
	$extensionAllowed = array('jpg', 'jpeg', 'png');//savoir si l'extention est autorisé
    $extensionUpload = strtolower(substr(strrchr($_FILES['photo']['name'], '.'), 1));

    if($_FILES['photo']['error'] > 0) {
    	echo 'erreur lors du transfert';
    } elseif ($_FILES['photo']['size'] > $maxsize) {
        echo 'desoler mais votre fichier est trop gros';
    } elseif(!in_array($extensionUpload, $extensionAllowed)) {
        echo'l\'extention du fichier n\'est pas autorisé';
    } else {
    	//changement de nom et transfert de la photo dans le dossier imgPost
    	$datePicture = date('Y_m_d_H_i_s');
        $namePhoto = "{$datePicture}.{$extensionUpload}";
        $transfertFile ="img\imgPost\\$namePhoto";
        $result = move_uploaded_file($_FILES['photo']['tmp_name'], $transfertFile);

        addArticle($id, $title, $chapo, $content);
        $reqId = recoveryIdArticle($title, $chapo);
        $idArticle = $reqId[0];
        photoJoin($idArticle, $datePicture, $extensionUpload, $description);

        $message = "Félicitation! votre article a été créé. Il sera visible dès qu'un administrateur aura valider cet article.";

        loadTemplate('message.php', $message);

    }
}
