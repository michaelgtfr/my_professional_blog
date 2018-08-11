<?php

function commentRecovery()
{
	$db = pdo();

	if(isset($db)) {
		$req = $db->query('SELECT * FROM comment WHERE validation = 0');
		return $req;
	}
}

function validationComment($id)
{
    $db = pdo();

    if(isset($db)) {
    	$req = $db->prepare('UPDATE comment SET validation = 1 WHERE id = :id');
    	$req->bindParam('id', $id);
    	$req->execute();
    }
}

function deletedComment($id)
{
	$db = pdo();
    if(isset($db)) {
    	$req = $db->prepare('DELETE FROM comment WHERE id = :id');
    	$req->bindParam('id', $id);
    	$req->execute();
    }

}

function addArticle($id, $title, $chapo, $content)
{

        $req = pdo()->prepare('INSERT INTO blog_posts(author, validate_blog_post, title, chapo, content, date_update, date_create)
            VALUES(:author, :validate_blog_post, :title, :chapo, :content, NOW(), NOW())');
        $req->bindParam('author', $id);
        $req->bindValue('validate_blog_post', 0);
        $req->bindParam('title', $title);
        $req->bindParam('chapo', $chapo);
        $req->bindParam('content', $content);
        $req->execute();   
}

function recoveryIdArticle($title, $chapo)
{
        $req = pdo()->prepare('SELECT id FROM blog_posts WHERE title = :title AND chapo = :chapo');
        $req->bindParam('title', $title);
        $req->bindParam('chapo', $chapo);
        $req->execute();

        return $req;
}

function photoJoin($id, $datePicture, $extensionUpload, $description)
{
        $req = pdo()->prepare('INSERT INTO picture(update_post_id, blog_posts_id, name, extention, description)
            VALUES(NULL, :blog_posts_id, :name, :extention, :description)');
        $req->bindParam('blog_posts_id', $id);
        $req->bindParam('name', $datePicture);
        $req->bindParam('extention', $extensionUpload);
        $req->bindParam('description', $description);
        $req->execute();
}
