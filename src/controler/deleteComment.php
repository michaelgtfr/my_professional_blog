<?php

function deleteComment($params)
{
	$id = $params[0];
	deletedComment($id);
	$message = 'Commentaire supprimer, vous pouvez continué de valider ou refuser des commentaires';
	$req = commentRecovery();
    $returnMessages = array($message, $req);
    loadTemplate('commentManagement.php', $returnMessages);
}