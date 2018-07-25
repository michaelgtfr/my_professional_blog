<?php

function userRecovery($email)
{
	$db = pdo();

	if(isset($db)) {
		$req = $db->prepare('SELECT id, email, password FROM user WHERE email = :email');

		$req->bindParam(':email', $email);
		$req->execute();

		return $req;
	} else {
		echo'probleme de connection';
	}
}
