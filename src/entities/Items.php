<?php
namespace MyModule\entities;

use MyModule\entities\EntityManagement;

/**
*Class containing the entity on the photo.
*/
class Items extends EntityManagement
{
    protected $id;
    protected $idBlogPost;
    protected $author;
    protected $validateBlogPost;
    protected $title;
    protected $chapo;
    protected $content;
    protected $dateUpdate;
    protected $dateCreate;
    protected $idPicture;
    protected $updatePostIdPicture;
    protected $blogPostsIdPicture;
    protected $namePicture;
    protected $extentionPicture;
    protected $descriptionPicture;
    protected $firstName;
    protected $email;

    public function __construct()
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function getIdBlogPost()
    {
        return $this->idBlogPost;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getValidateBlogPost()
    {
        return $this->validateBlogPost;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getChapo()
    {
        return $this->chapo;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getDateUpdate()
    {
        return $this->dateUpdate;
    }

    public function getDateCreate()
    {
        return $this->dateCreate;
    }

    public function getIdPicture()
    {
        return $this->idPicture;
    }

    public function getUpdatePostIdPicture()
    {
        return $this->updatePostIdPicture;
    }

    public function getBlogPostIdPicture()
    {
        return $this->blogPostsIdPicture;
    }

    public function getNamePicture()
    {
        return $this->namePicture;
    }

    public function getExtentionPicture()
    {
        return $this->extentionPicture;
    }

    public function getDescriptionPicture()
    {
        return $this->descriptionPicture;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setIdBlogPost($idBlogPost)
    {
        $this->idBlogPost = $idBlogPost;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function setValidateBlogPost($validateBlogPost)
    {
        $this->validateBlogPost = $validateBlogPost;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setChapo($chapo)
    {
        $this->chapo = $chapo;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setDateUpdate($dateUpdate)
    {
        $this->dateUpdate = $dateUpdate;
    }

    public function setDateCreate($dateCreate)
    {
        $this->dateCreate = $dateCreate;
    }

    public function setIdPicture($idPicture)
    {
        $this->idPicture = $idPicture;
    }

    public function setUpdatePostIdPicture($updatePostIdPicture)
    {
        $this->updatePostIdPicture = $updatePostIdPicture;
    }

    public function setBlogPostIdPicture($blogPostsIdPicture)
    {
        $this->blogPostsIdPicture = $blogPostsIdPicture;
    }

    public function setNamePicture($namePicture)
    {
        $this->namePicture = $namePicture;
    }

    public function setExtentionPicture($extentionPicture)
    {
        $this->extentionPicture = $extentionPicture;
    }

    public function setDescriptionPicture($descriptionPicture)
    {
        $this->descriptionPicture = $descriptionPicture;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
}
