<?php

require __DIR__.'./../fonction/pagination.php';

function listArticles($params)
{
	$returnMessages = pagination('blog_posts', $params);
	loadTemplate('listOfArticles.php', $returnMessages);
}
