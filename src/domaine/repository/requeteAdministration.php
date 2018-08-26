<?php

function userRecovery($email)
{
		$req = pdo()->prepare('SELECT id, email, password, confirmation, validation, role FROM user WHERE email = :email');
		$req->bindParam('email', $email);
		$req->execute();

        $resultat = $req->fetch();
		return $resultat;
}

function registration($name, $firstname, $email, $photo, $presentation, $passwordHash, $key)
{
		$req = pdo()->prepare('INSERT INTO user(name, first_name, confirmation, validation, email, photo, presentation, password, role, date_create, confirmation_key) 
			VALUES(:name, :first_name, :confirmation, :validation, :email, :photo, :presentation, :password, :role, NOW(), :confirmation_key)');
		$req->bindParam('name', $name);
		$req->bindParam('first_name', $firstname);
		$req->bindValue('confirmation', 0);
		$req->bindValue('validation', 0);
		$req->bindParam('email', $email);
		$req->bindParam('photo', $photo);
		$req->bindParam('presentation', $presentation);
		$req->bindParam('password', $passwordHash);
        $req->bindValue('role', 'editeur');
        $req->bindParam('confirmation_key', $key);
        $req->execute();

        var_dump($req);
}

function confirmation($email)
{
		$req = pdo()->prepare('SELECT id, confirmation, email, confirmation_key FROM user Where email = :email');
		$req->bindParam(':email', $email);
		$req->execute();

        $result = $req->fetch();
		return $result;
}

function validateConfirmation($email)
{
		$req = pdo()->prepare('UPDATE user SET confirmation = 1 WHERE email = :email');
		$req->bindParam('email', $email);
		$req->execute();
}

function updateEmail($id, $email)
{
		$req = pdo()->prepare('UPDATE user SET email = :email WHERE id = :id');
		$req->bindParam('email', $email);
		$req->bindParam('id', $id);
		$req->execute();
}

function verificationElement($email, $name)
{
		$req = pdo()->prepare('SELECT email, name, confirmation_key FROM user WHERE email = :email AND name = :name');
		$req->bindParam('email', $email);
		$req->bindParam('name', $name);
		$req->execute();

        $result = $req->fetch();
		return $result;
}

function changePassword($email, $password)
{
		$req = pdo()->prepare('UPDATE user SET password = :password, confirmation = 0  WHERE email = :email');
		$req->bindParam('password', $password);
		$req->bindParam('email', $email);
		$req->execute();
}

function userAccount($id)
{
		$req = pdo()->prepare('SELECT id, name, first_name, email, photo, presentation, role, date_create FROM user WHERE id = :id');
		$req->bindParam('id', $id);
		$req->execute();

        $req = $req->fetch(PDO::FETCH_ASSOC);
		return $req;
}
