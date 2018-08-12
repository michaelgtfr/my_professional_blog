<?php
function detailArticle($params)
{
	$returnMessages = articleDetail($params);
	$data = $returnMessages->fetch();
	loadTemplate('articleDetail.php', $data);
}
