<?php

require __DIR__.'./../domaine/repository/requeteAdministrateur.php';

function commentManagement()
{
	$req = commentRecovery();
	$message = 'Ici vous pouvez valider ou refuser les commentaires omis par les utilisateurs';
	loadTemplate('commentManagement.php', array($message, $req));
}