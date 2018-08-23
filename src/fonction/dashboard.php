<?php

function dashboard($id)
{
	$result = userAccount($id);
    loadTemplate('dashboard.php',$result);
}