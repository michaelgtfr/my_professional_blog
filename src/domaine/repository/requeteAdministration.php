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
		echo'probleme de connexion';
	}
}

function registration($name, $firstname, $email, $photo, $presentation, $passwordHash, $key)
{
	$db = pdo();
	if(isset($db)) {
		$req = $db->prepare('INSERT INTO user(name, first_name, confirmation, validation, email, photo, presentation, password, role, date_create, confirmation_key) 
			VALUES(:name, :first_name, :confirmation, :validation, :email, :photo, :presentation, :password, :role, NOW(), :confirmation_key)');
		$req->execute(array(
            'name' => $name,
            'first_name' => $firstname,
            'confirmation' => 0,
            'validation' => 0,
            'email' => $email,
            'photo' => $photo,
            'presentation' => $presentation,
            'password' => $passwordHash,
            'role' => 'editeur',
            'confirmation_key' => $key
		));
	}
}

function confirmation($email)
{
	$db = pdo();
	if(isset($db)) {
		$req = $db->prepare('SELECT id, confirmation, email, confirmation_key FROM user Where email = :email');
		$req->bindParam(':email', $email);
		$req->execute();

		return $req;
	}
}

function validateConfirmation($email)
{
	$db = pdo();
	if(isset($db)) {
		$req = $db->prepare('UPDATE user SET confirmation = 1 WHERE email = :email');
		$req->bindParam('email', $email);
		$req->execute();
	}
}

function updateEmail($id, $email)
{
	$db = pdo();
	if(isset ($db)) {
		$req = $db->prepare('UPDATE user SET email = :email WHERE id = :id');
		$req->bindParam('email', $email);
		$req->bindParam('id', $id);
		$req->execute();
	}
}
