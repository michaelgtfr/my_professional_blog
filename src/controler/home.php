<?php

require __DIR__.'./../../etc/templateLoader.php';

function home()
{
	$req = new ArticleManagement();
	$returnMessages = $req->lastThreeAddition();

	if(isset($returnMessages)) {
		loadTemplate('home.php',$returnMessages);		
	} else {
		throw new Exception('Sorry, no item found');
	}	
}
