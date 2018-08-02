<?php

function emailReconfirmation($params)
{
	$email = $_GET['email'];
	loadTemplate('emailReconfirmation.php', $email);
}