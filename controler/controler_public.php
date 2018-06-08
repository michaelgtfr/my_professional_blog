<?php

require('src/domaine/repository/requete.php');


function homePage()
{
	$lastThreeAddition= lastThreeAddition();

	if(isset($lastThreeAddition))
	{

	require('view/home_page.php');

	}
	else
	{
		throw new Exception('Desolate item recovery problem');
	}	
}