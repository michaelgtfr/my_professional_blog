<?php



function lastThreeAddition() 
{
	$db = pdo();

	if(isset($db)){

	$req = $db->query('SELECT 	blog_posts.id,
								blog_posts.title,
								blog_posts.chapo,
								blog_posts.validate_blog_post,
								blog_posts.autor,
							 	picture.blog_posts_id,
							 	picture.name,
							 	picture.extention,
							 	picture.description  
						FROM blog_posts 
						INNER JOIN picture
						ON blog_posts.id = picture.blog_posts_id
						WHERE validate_blog_post = true 
						ORDER BY id DESC LIMIT 0,2');

		if(isset($req)){
			return $req; 
		} else {
			throw new Exception('Recovery of the last additions impossible'); 
		}
	} else {
		throw new Exception('Connection with the database impossible'); 
	}
}