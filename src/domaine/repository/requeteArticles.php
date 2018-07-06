<?php

require __DIR__.'./../../../etc/database/pdo.php';

function listingOfArticles(){

	$db = pdo();

	if(isset($db)){

		$req = $db->query('SELECT 	blog_posts.id AS id,
									blog_posts.title AS title,
									blog_posts.chapo AS chapo, 
									blog_posts.validate_blog_post AS validate,
									blog_posts.autor AS author,
									picture.blog_post_id AS id_picture, 
									picture.name AS name_picture, 
									picture.extention AS extention_picture, 
									picture.description AS description_picture
			FROM blog_posts 
			INNER JOIN picture
			ON blog_posts.id= picture.blog_post_id
			WHERE validate_blog_post = TRUE ORDER BY DESC LIMIT'. $premiereEntree.', '.$messagesParPage.'');

		return $req;
	}
	else{
		echo ' probleme requeteArticles'; //francais
	}
}