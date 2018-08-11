<?php

function articleCreation()
{
	if(isset($_SESSION['id']) && isset($_SESSION['email'])) {
	loadTemplate('articleCreation.php', '');
    } else {
    	$message = 'Désoler, mais vous pouvez pas aller sur cette page sans vous connectez.';
    	loadTemplate('message.php', $message);
    }
}
