<?php


function validateComment($params)
{
    $id = $params[0];
    validationComment($id);
    $message = 'La validation du commentaire est réussit, vous pouvez continuer si vous le voulez à valider d\'autre commentaire';
    $req = commentRecovery();
    $returnMessages = array($message, $req);
    loadTemplate('commentManagement.php', $returnMessages);
}