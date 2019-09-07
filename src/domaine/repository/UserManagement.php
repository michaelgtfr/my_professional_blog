<?php
namespace MyModule\domaine\repository;

use MyModule\domaine\repository\DBConnect;

/**
*Class containing all user requests.
*/
class UserManagement extends DBConnect
{
    public function userRecovery($email)
    {
        $req = $this->db->prepare('SELECT id, email, password, confirmation,
	  	                    validation, role FROM user WHERE email = :email AND confirmation = 1 AND validation = 1');
        $req->bindParam('email', $email);
        $req->execute();

        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'MyModule\\entities\\User');

        $result = $req->fetch();
        
        return $result;
    }

    public function registration(
        $name,
        $firstname,
        $email,
        $photo,
        $presentation,
        $passwordHash,
        $key
    ) {
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
			                confirmation_key AS confirmationKey FROM user Where email = :email AND confirmation = 0');
        $req->bindParam('email', $email);
        $req->execute();

        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'MyModule\\entities\\User');

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

    public function updateEmail($idUser, $email)
    {
        $req = $this->db->prepare('UPDATE user SET email = :email 
			                    WHERE id = :id');
        $req->bindParam('email', $email);
        $req->bindParam('id', $idUser);
        $req->execute();
    }

    public function verificationElement($email, $name)
    {
        $req = $this->db->prepare('SELECT name, confirmation_key as confirmationKey
			                    FROM user 
			                    WHERE email = :email AND name = :name');
        $req->bindParam('email', $email);
        $req->bindParam('name', $name);
        $req->execute();

        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'MyModule\\entities\\User');

        return $req->fetch();
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

    public function userAccount($idUser)
    {
        $req = $this->db->prepare('SELECT id,name,
                        first_name AS firstName,
                        email,photo,presentation,role,
                        date_create AS dateCreate FROM user WHERE id = :id');
        $req->bindParam('id', $idUser);
        $req->execute();

        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'MyModule\\entities\\User');
        
        $result = $req->fetch();
        
        return $result;
    }

    public function userAccountNoValidate()
    {
        $req = $this->db->query('SELECT id, name, first_name AS firstName, photo,
                                presentation, date_create AS dateCreate FROM user 
                                WHERE confirmation = 1 AND validation = 0');

        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'MyModule\\entities\\User');

        return $req->fetchAll();
    }

    public function reqUserAccountValidate($idUser)
    {
        $req = $this->db->prepare('UPDATE user SET validation = 1 
        	                    WHERE  id = :id');
        $req->bindParam('id', $idUser);
        $req->execute();
    }

    public function reqUserEmailAccount($idUser)
    {
        $req = $this->db->prepare('SELECT email FROM user WHERE id = :id');
        $req->bindParam('id', $idUser);
        $req->execute();

        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'MyModule\\entities\\User');

        return $req->fetch();
    }

    public function reqUserEmailAndPhotoAccount($idUser)
    {
        $req = $this->db->prepare('SELECT email, photo FROM user 
        	                    WHERE id = :id');
        $req->bindParam('id', $idUser);
        $req->execute();

        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'MyModule\\entities\\User');

        return $req->fetch();
    }

    public function reqUserAccountReject($idUser)
    {
        $req = $this->db->prepare('DELETE FROM user WHERE id = :id');
        $req->bindParam('id', $idUser);
        $req->execute();
    }

    public function reqUpdateUserAccount(
        $idUser,
        $name,
        $firstName,
        $email,
        $presentation,
        $photo
    ) {
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
        $req->bindParam('id', $idUser);
        $req->execute();
    }
}
