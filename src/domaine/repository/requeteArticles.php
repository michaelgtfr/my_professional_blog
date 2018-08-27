<?php

require __DIR__.'./../../../etc/database/pdo.php';

function listingOfArticles($firstEnter, $messagesByPage)
{
		$req = pdo()->prepare('SELECT blog_posts.id AS id,
									blog_posts.title AS title,
									blog_posts.chapo AS chapo, 
									blog_posts.validate_blog_post AS validate,
									blog_posts.author AS author,
									picture.blog_posts_id AS id_picture, 
									picture.name AS name_picture, 
									picture.extention AS extention_picture, 
									picture.description AS description_picture
			FROM blog_posts 
			INNER JOIN picture
			ON blog_posts.id = picture.blog_posts_id
			WHERE validate_blog_post = true ORDER BY id DESC LIMIT :firstEnter, :messagesByPage');

		$req->bindParam(':firstEnter', $firstEnter, PDO::PARAM_INT);
		$req->bindParam(':messagesByPage', $messagesByPage, PDO::PARAM_INT);
		$req->execute();

		return $req;
}

function articleDetail($id)
{
	$req = pdo()->prepare('SELECT blog_posts.id AS id,
									blog_posts.title AS title,
									blog_posts.chapo AS chapo,
									blog_posts.validate_blog_post AS validate,
									blog_posts.author AS author,
									blog_posts.content AS content,
									blog_posts.date_update AS create_date,
									picture.blog_posts_id AS id_picture, 
									picture.name AS name_picture, 
									picture.extention AS extention_picture, 
									picture.description AS description_picture,
									user.id AS id_author,
									user.first_name AS name_author
								FROM blog_posts
								INNER JOIN picture
								ON blog_posts.id = picture.blog_posts_id
								INNER JOIN user
								ON blog_posts.author = user.id  
								WHERE validate_blog_post = true AND blog_posts.id = :id');
	$req->bindParam(':id', $id, PDO::PARAM_INT);
	$req->execute();
	
	$data = $req->fetch();	
	return $data;
}

function lastThreeAddition() 
{

	$req = pdo()->query('SELECT blog_posts.id,
								blog_posts.title,
								blog_posts.chapo,
								blog_posts.validate_blog_post,
								blog_posts.author,
							 	picture.blog_posts_id,
							 	picture.name,
							 	picture.extention,
							 	picture.description  
							FROM blog_posts 
							INNER JOIN picture
							ON blog_posts.id = picture.blog_posts_id
							WHERE validate_blog_post = true 
							ORDER BY id DESC LIMIT 0,2');

	return $req; 

}

function detailComment($id)
{
	$req = pdo()->prepare('SELECT date_create, author, content FROM comment WHERE blog_post_id = :id AND validation = 1');
	$req->bindParam('id', $id);
	$req->execute();

	$comment = $req->fetchAll(PDO::FETCH_ASSOC);
	return $comment;
}

function addComment($author, $content, $email, $id)
{
    $req = pdo()->prepare('INSERT INTO comment(blog_post_id, validation, date_create, author, email, content) VALUES (:blog_post_id, :validation, NOW(), :author, :email, :content)');
    $req->bindParam('blog_post_id', $id);
    $req->bindValue('validation', 0);
    $req->bindParam('author', $author);
    $req->bindParam('email', $email);
    $req->bindParam('content', $content);
    $req->execute();
}
