<?php
require __DIR__.'./../fonction/pagination.php';
require __DIR__.'./../domaine/repository/requeteArticles.php';

function listArticles($params)
{
	$returnMessages = pagination('blog_posts', $params);

	loadTemplate('listOfArticles.php', $returnMessages);
}
