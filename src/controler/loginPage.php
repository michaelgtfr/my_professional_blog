<?php
session_start();
require __DIR__.'./../../src/fonction/dashboard.php';

function loginPage()
{
	if(isset($_SESSION['id']) && isset($_SESSION['email'])) {
		dashboard($_SESSION['id']);
	} else {
	    loadTemplate('loginPage.php', '');
    }
}