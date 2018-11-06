<?php

namespace MyModule\entities;

use MyModule\entities\EntityManagement;

class Comment extends EntityManagement
{
	protected $idComment;
	protected $blogPostIdComment;
	protected $validationComment;
	protected $dateCreateComment;
	protected $authorComment;
	protected $emailComment;
	protected $contentComment;

	public function __construct()
	{

	}
	
	public function getIdComment()
	{
		return $this->idComment;
	}

	public function getBlogPostIdComment()
	{
		return $this->blogPostIdComment;
	}

	public function getValidationComment()
	{
		return $this->validationComment;
	}

	public function getDateCreateComment()
	{
		return $this->dateCreateComment;
	}

	public function getAuthorComment()
	{
		return $this->authorComment;
	}

	public function getEmailCommment()
	{
		return $this->emailComment;
	}

	public function getContentComment()
	{
		return $this->contentComment;
	}

	public function setIdComment($idComment)
	{
		$this->idComment = $idComment;
	}

	public function setBlogPostIdComment($blogPostIdComment)
	{
		$this->blogPostIdComment = $blogPostIdComment;
	}

	public function setValidationComment($validationComment)
	{
		$this->validationComment = $validationComment;
	}

	public function setDateCreateComment($dateCreateComment)
	{
		$this->dateCreateComment = $dateCreateComment;
	}

	public function setAuthorComment($authorComment)
	{
		$this->authorComment = $authorComment;
	}

	public function setEmailCommment($emailComment)
	{
		$this->emailComment = $emailComment;
	}

	public function setContentComment($contentComment)
	{
		$this->contentComment = $contentComment;
	}
}
