<?php

require __DIR__.'./../../../etc/database/pdo.php';

function listingOfArticles($firstEnter, $messagesByPage)
{
	$db = pdo();

	if(isset($db)){
		$req = $db->prepare('SELECT blog_posts.id AS id,
									blog_posts.title AS title,
									blog_posts.chapo AS chapo, 
									blog_posts.validate_blog_post AS validate,
									blog_posts.autor AS author,
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

	} else {
		echo ' error requete'; 
	}
}

function articleDetail($params)
{
	$db = pdo();

	$id = intval($params[0]);

	if (isset($db)){
		$req = $db->prepare('SELECT blog_posts.id AS id,
									blog_posts.title AS title,
									blog_posts.chapo AS chapo,
									blog_posts.validate_blog_post AS validate,
									blog_posts.autor AS author,
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
								ON blog_posts.autor = user.id  
								WHERE validate_blog_post = true AND blog_posts.id = :id');

		$req->bindParam(':id', $id, PDO::PARAM_INT);
		$req->execute();
		
		return $req;
	} else {
		echo 'error requete';
	}
}