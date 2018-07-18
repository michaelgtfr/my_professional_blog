<?php

function detailArticle($params)
{
	$returnMessages = articleDetail($params);
	
	loadTemplate('articleDetail.php', $returnMessages);
}