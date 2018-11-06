<?php

namespace MyModule\entities;

use MyModule\entities\EntityManagement;

class Picture extends EntityManagement
{
	protected $idPicture;
	protected $updatePostIdPicture;
	protected $blogPostsIdPicture;
	protected $namePicture;
	protected $extentionPicture;
	protected $descriptionPicture;

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
}
