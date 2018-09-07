<?php

require_once 'DbConnect.php';

class UserManagement extends DbConnect
{
    public function userRecovery($email)
    {
	  	$req = $this->db->prepare('SELECT id, email, password, confirmation,
	  	                    validation, role FROM user WHERE email = :email');
	  	$req->bindParam('email', $email);
		$req->execute();

        $resultat = $req->fetch();
		return $resultat;
    }

    public function registration($name, $firstname, $email, $photo,
                                $presentation, $passwordHash, $key)
    {
		$req = $this->db->prepare('INSERT INTO user(name, first_name, 
			            confirmation, validation, email, photo, presentation,
		                password, role, date_create, confirmation_key) 
			            VALUES(:name, :first_name, :confirmation, :validation,
			            :email, :photo, :presentation, :password, :role, NOW(), 
			            :confirmation_key)');
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
    }

    public function confirmation($email)
    {
		$req = $this->db->prepare('SELECT id, confirmation, email, 
			                confirmation_key FROM user Where email = :email');
		$req->bindParam(':email', $email);
		$req->execute();

        $result = $req->fetch();
		return $result;
    }

    public function validateConfirmation($email)
    {
		$req = $this->db->prepare('UPDATE user SET confirmation = 1 
			                    WHERE email = :email');
		$req->bindParam('email', $email);
		$req->execute();
    }

    public function updateEmail($id, $email)
    {
		$req = $this->db->prepare('UPDATE user SET email = :email 
			                    WHERE id = :id');
		$req->bindParam('email', $email);
		$req->bindParam('id', $id);
		$req->execute();
    }

    public function verificationElement($email, $name)
    {
		$req = $this->db->prepare('SELECT email, name, confirmation_key 
			                    FROM user 
			                    WHERE email = :email AND name = :name');
		$req->bindParam('email', $email);
		$req->bindParam('name', $name);
		$req->execute();

        $result = $req->fetch();
		return $result;
    }

    public function changePassword($email, $password)
    {
		$req = $this->db->prepare('UPDATE user 
			                    SET password = :password, confirmation = 0 
			                    WHERE email = :email');
		$req->bindParam('password', $password);
		$req->bindParam('email', $email);
		$req->execute();
    }

    public function userAccount($id)
    {
		$req = $this->db->prepare('SELECT id, name, first_name, email, photo,
		            presentation, role, date_create FROM user WHERE id = :id');
		$req->bindParam('id', $id);
		$req->execute();

        $req = $req->fetch(PDO::FETCH_ASSOC);
		return $req;
    }

    public function userAccountNoValidate()
    {
        $req = $this->db->query('SELECT id, name, first_name, photo,
                                presentation, date_create FROM user 
                                WHERE confirmation = 1 AND validation = 0');

        $return = $req->fetchAll();
        return $return;
    }

    public function reqUserAccountValidate($id)
    {
        $req = $this->db->prepare('UPDATE user SET validation = 1 
        	                    WHERE  id = :id');
        $req->bindParam('id', $id);
        $req->execute();
    }

    public function reqUserEmailAccount($id)
    {
        $req = $this->db->prepare('SELECT email FROM user WHERE id = :id');
        $req->bindParam('id', $id);
        $req->execute();

        $email = $req->fetch(PDO::FETCH_ASSOC);
        return $email;
    }

    public function reqUserEmailAndPhotoAccount($id)
    {
        $req = $this->db->prepare('SELECT email, photo FROM user 
        	                    WHERE id = :id');
        $req->bindParam('id', $id);
        $req->execute();

        $emailAndPhoto = $req->fetch(PDO::FETCH_ASSOC);
        return $emailAndPhoto;
    }

    public function reqUserAccountReject($id)
    {
        $req = $this->db->prepare('DELETE FROM user WHERE id = :id');
        $req->bindParam('id', $id);
        $req->execute();
    }

    public function reqUpdateUserAccount
    ($id, $name, $firstName, $email, $presentation, $photo)
    {
        $req = $this->db->prepare('UPDATE user SET name = :name,
                                        first_name = :firstName,
                                        email = :email,
                                        presentation = :presentation,
                                        photo = :photo
                                        WHERE id = :id');
        $req->bindParam('name', $name);
        $req->bindParam('firstName', $firstName);
        $req->bindParam('email', $email);
        $req->bindParam('presentation', $presentation);
        $req->bindParam('photo', $photo);
        $req->bindParam('id', $id);
        $req->execute();
    }
}
