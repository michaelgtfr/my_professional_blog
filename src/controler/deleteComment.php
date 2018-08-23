<?php

function deleteComment($params)
{
	deletedComment($params[0]);
	$message = 'Commentaire supprimer, vous pouvez continué de valider ou refuser des commentaires';
	$req = commentRecovery();
    loadTemplate('commentManagement.php', array($message, $req));
}