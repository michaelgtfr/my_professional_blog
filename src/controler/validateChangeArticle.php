<?php

function validateChangeArticle()
{
    $reqArticle = recoverModifyArticle();
	$message = 'Vous étes sur la partie modification d\'un article deja validé. Vous pouvez choisir si oui ou non, il peut modifier l\'article déja présent sur le blog.';
	loadTemplate('validateChangeArticle.php', array($message, $reqArticle));
}

function validateTheChange($params)
{
	$newData = validateTheModify($params[0]);//Recovered the data changes 
	modifyTheDonnees($newData); //Saving data change instead of validated information
    $verification = recoveryPicture($params[0]); //Recovered the ID of the photo to check if the photo is the same for the posted article
    if($verification['blog_posts_id'] == NULL) {
        $return = recoveryNameExtentionPicture($newData['blog_post_id']);//Recovered the name and the extention to delete the file in the IMG folder
        unlink(__DIR__.'./../../public/img/imgPost/'.$return['name'].'.'.$return['extention']);
        reqDeletedPicture($newData['blog_post_id']);//Removes the old validated photo
    }
    reqModifyPicture($newData['blog_post_id'], $params[0]);//Modifies the changed photo's attribute
    deleteTheModify($params[0]);//Removes the attributes in Blog_post_update
    $message = 'L\'article a été modifié, vous pouvez continuer à juger les autres articles modifié.';
    $reqArticle = recoverModifyArticle();
	loadTemplate('validateChangeArticle.php', array($message, $reqArticle)); 
}

function refuseTheChange($params)
{
    deleteTheModify($params[0]); // Deletes the data in blog_post_update
    $verification = recoveryPicture($params[0]); // Recovered the ID of the photo to check if the photo is the same for the posted article

    if($verification[0] == NULL) { //If it is not the same one deletes otherwise one modifies
        unlink(__DIR__.'./../../public/img/imgPost/'.$verification['name'].'.'.$verification['extention']);//delete the file in the IMG folder
        deletePicture($params[0]);
    } else {
        modifyPicture($params[0]);
    }
    $req = recoverModifyArticle();
    $message = 'L\'article a été supprimé, vous pouvez continuer à juger les autres articles modifié.';
	loadTemplate('validateChangeArticle.php', array($message, $reqArticle));
}
