<?php

function validateChangeArticle()
{
    $req = recoverModifyArticle();
    $reqArticle = $req->fetch(PDO::FETCH_ASSOC);
	$message = 'Vous étes sur la partie modification d\'un article deja validé. Vous pouvez choisir si oui ou non, il peut modifier l\'article déja présent sur le blog.';
	$returnMessage = array($message, $reqArticle);
	loadTemplate('validateChangeArticle.php', $returnMessage);
}

function validateTheChange($params)
{
	$req = validateTheModify($params[0]);//Recovered the data changes
	$newData = $req->fetch(PDO::FETCH_ASSOC); 
	modifyTheDonnees($newData); //Saving data change instead of validated information
    $req = recoveryPicture($params[0]); //Recovered the ID of the photo to check if the photo is the same for the posted article
    $verification = $req->fetch();
    if($verification['blog_posts_id'] == NULL) {
        $req = recoveryNameExtentionPicture($newData['blog_post_id']);//Recovered the name and the extention to delete the file in the IMG folder
        var_dump($req);
        $return = $req->fetch(PDO::FETCH_ASSOC);
        unlink(__DIR__.'./../../public/img/imgPost/'.$return['name'].'.'.$return['extention']);
        reqDeletedPicture($newData['blog_post_id']);//Removes the old validated photo
    }
    reqModifyPicture($newData['blog_post_id'], $params[0]);//Modifies the changed photo's attribute
    deleteTheModify($params[0]);//Removes the attributes in Blog_post_update
    $message = 'L\'article a été modifié, vous pouvez continuer à juger les autres articles modifié.';
    $req = recoverModifyArticle();
    $reqArticle = $req->fetch(PDO::FETCH_ASSOC);
    $returnMessage = array($message, $reqArticle);
	loadTemplate('validateChangeArticle.php', $returnMessage); 
}

function refuseTheChange($params)
{
    deleteTheModify($params[0]); // Deletes the data in blog_post_update
    $req = recoveryPicture($params[0]); // Recovered the ID of the photo to check if the photo is the same for the posted article
    $verification = $req->fetch();

    if($verification[0] == NULL) { //If it is not the same one deletes otherwise one modifies
        unlink(__DIR__.'./../../public/img/imgPost/'.$verification['name'].'.'.$verification['extention']);//delete the file in the IMG folder
        deletePicture($params[0]);
    } else {
        modifyPicture($params[0]);
    }
    $req = recoverModifyArticle();
    $message = 'L\'article a été supprimé, vous pouvez continuer à juger les autres articles modifié.';
    $reqArticle = $req->fetch(PDO::FETCH_ASSOC);
    $returnMessage = array($message, $reqArticle);
	loadTemplate('validateChangeArticle.php', $returnMessage);
}
