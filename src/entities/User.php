<?php
namespace MyModule\entities;

use MyModule\entities\EntityManagement;
/**
*Class containing the entity on the users.
*/
class User extends EntityManagement
{
    private $id;
    private $name;
    private $firstName;
    private $confirmation;
    private $validation;
    private $email;
    private $photo;
    private $presentation;
    private $password;
    private $role;
    private $dateCreate;
    private $confirmationKey;

    public function __construct()
    {
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getConfirmation()
    {
        return $this->confirmation;
    }

    public function getValidation()
    {
        return $this->validation;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function getPresentation()
    {
        return $this->presentation;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getDateCreate()
    {
        return $this->dateCreate;
    }

    public function getConfirmationKey()
    {
        return $this->confirmationKey;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function setConfirmation($confirmation)
    {
        $this->confirmation = $confirmation;
    }

    public function setValidation($validation)
    {
        $this->validation = $validation;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    public function setPresentation($presentation)
    {
        $this->presentation = $presentation;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function setDateCreate($dateCreate)
    {
        $this->dateCreate = $dateCreate;
    }

    public function setConfirmationKey($confirmationKey)
    {
        $this->confirmationKey = $confirmationKey;
    }
}
