<?php

require __DIR__.'./../fonction/pagination.php';


function listArticles($params){


	require __DIR__.'./../domaine/repository/requeteArticles.php';

	$retour_messages = pagination('blog_posts', $params, $req);

	loadTemplate('listOfArticles.php');
	
}