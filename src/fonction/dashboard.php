<?php

function dashboard($id)
{
	$req = userAccount($id);
    $result = $req->fetch();
    loadTemplate('dashboard.php',$result);
}