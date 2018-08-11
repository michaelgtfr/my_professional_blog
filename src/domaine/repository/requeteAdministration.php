<?php

function userRecovery($email)
{
	$db = pdo();
	if(isset($db)) {
		$req = $db->prepare('SELECT id, email, password, confirmation, validation FROM user WHERE email = :email');
		$req->bindParam('email', $email);
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
		$req->bindParam('name', $name);
		$req->bindParam('firstname', $firstname);
		$req->bindValue('confirmation', 0);
		$req->bindValue('validation', 0);
		$req->bindParam('email', $email);
		$req->bindParam('photo', $photo);
		$req->bindParam('presentation', $presentation);
		$req->bindParam('password', $passwordHash);
        $req->bindValue('role', 'editeur');
        $req->bindParam('confirmation_key', $key);
        $req->execute();
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

function verificationElement($email, $name)
{
	$db = pdo();
	if(isset ($db)) {
		$req = $db->prepare('SELECT email, name, confirmation_key FROM user WHERE email = :email AND name = :name');
		$req->bindParam('email', $email);
		$req->bindParam('name', $name);
		$req->execute();

		return $req;
	}
}

function changePassword($email, $password)
{
	$db = pdo();
	if(isset($db)) {
		$req = $db->prepare('UPDATE user SET password = :password, confirmation = 0  WHERE email = :email');
		$req->bindParam('password', $password);
		$req->bindParam('email', $email);
		$req->execute();
	}
}

function userAccount($id)
{
	$db = pdo();
	if(isset($db)) {
		$req = $db->prepare('SELECT name, first_name, email, photo, presentation, role, date_create FROM user WHERE id = :id');
		$req->bindParam('id', $id);
		$req->execute();

		return $req;
	}
}
