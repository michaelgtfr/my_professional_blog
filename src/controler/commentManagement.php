<?php

require __DIR__.'./../domaine/repository/PictureManagement.php';
require __DIR__.'./../domaine/repository/ArticleManagement.php';
require __DIR__.'./../domaine/repository/UserManagement.php';
require __DIR__.'./../domaine/repository/CommentManagement.php';
require __DIR__.'./../domaine/repository/UpdatePostManagement.php';

function commentManagement()
{
	$req = commentRecovery();
	$message = 'Ici vous pouvez valider ou refuser les commentaires omis par les utilisateurs';
	loadTemplate('commentManagement.php', array($message, $req));
}
