<?php


function validateComment($params)
{
    validationComment($params[0]);
    $message = 'La validation du commentaire est réussit, vous pouvez continuer si vous le voulez à valider d\'autre commentaire';
    $req = commentRecovery();
    loadTemplate('commentManagement.php', array($message, $req));
}