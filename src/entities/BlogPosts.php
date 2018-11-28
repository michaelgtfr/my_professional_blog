<?php
namespace MyModule\entities;

use MyModule\entities\EntityManagement;

/**
*Class containing the entity on articles.
*/
class BlogPosts extends EntityManagement
{
    protected $id;
    protected $author;
    protected $validateBlogPost;
    protected $title;
    protected $chapo;
    protected $content;
    protected $dateUpdate;
    protected $dateCreate;

    public function __construct()
    {
    }

    public function getId()
    {
        return $this->id;
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

    public function setId($id)
    {
        $this->id = $id;
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
}
