<?php


require('controler/controler_public.php'); 

try
{
	if (isset($_GET['action']))
	{
		if($_GET['action']=='homePage')
		{
			homePage ();
		}
		else
		{
			throw new Exception('Désoler, mais la page que vous demandez n\'exite pas');  //francais
		}
	}
	else
	{
		homePage();
	}
}



catch(Exception $e)
{
	echo 'Erreur: ' . $e -> getMessage();

	// modified the part "catch" et create a file that will display an error message 
}