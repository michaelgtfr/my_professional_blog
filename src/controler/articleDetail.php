<?php
function detailArticle($params)
{
	$data = articleDetail($params);
	loadTemplate('articleDetail.php', $data);
}
