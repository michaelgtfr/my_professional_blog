<?php

require __DIR__.'./../../src/domaine/repository/requete.php';
require __DIR__.'./../../etc/templateLoader.php';

function home()
{
	$returnMessages = lastThreeAddition();

	if(isset($returnMessages)) {
		loadTemplate('home.php',$returnMessages);		
	} else {
		throw new Exception('Sorry, no item found');
	}	
}
