<?php
function detailArticle($params)
{
	$data = articleDetail($params[0]);
	$comment = detailComment($params[0]);
	loadTemplate('articleDetail.php', array($data, $comment));
}
