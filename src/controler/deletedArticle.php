<?php

function deletedArticle($params)
{
	if(isset($_SESSION['id']) && isset($_SESSION['email']) && $_SESSION['role'] = 'administrateur') {
		loadTemplate('deletedArticle.php', $params[0]);
	} else {
		$message = 'Désoler, mais vous ne pouvez pas accéder à cette page.';
		loadTemplate('message.php', $message);
	}
}

function postDeletedArticle($params)
{
	if(isset($_SESSION['id']) && isset($_SESSION['email']) && $_SESSION['role'] = 'administrateur') {
	    reqDeleteArticle($params[0]);
	    $message = 'L\'article a été effacé';
	    loadTemplate('message.php', $message);
	} else {
		$message = 'Désoler, mais vous ne pouvez pas accéder à cette page.';
		loadTemplate('message.php', $message);
	}
}
