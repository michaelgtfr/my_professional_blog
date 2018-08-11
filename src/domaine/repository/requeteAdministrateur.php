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

function noValidateArticles()
{
    $req = pdo()->query('SELECT blog_posts.id AS id,
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
                                user.first_name AS name_author,
                                user.email AS email
                                FROM blog_posts
                                INNER JOIN picture
                                ON blog_posts.id = picture.blog_posts_id
                                INNER JOIN user
                                ON blog_posts.author = user.id  
                                WHERE validate_blog_post = 0');

    return $req;
}

function reqArticleNoValidate($id)
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
                                WHERE blog_posts.id = :id');
    $req->bindParam('id', $id);
    $req->execute();

    return $req;
}

function reqValidateArticle($id)
{

    $req = pdo()->prepare('UPDATE blog_posts SET validate_blog_post = 1 WHERE id = :id');
    $req->bindParam('id', $id);
    $req->execute();
}

function reqDeleteArticle($id)
{
    $req = pdo()->prepare('DELETE FROM blog_posts WHERE id = :id');
    $req->bindParam('id', $id);
    $req->execute();

    $req = pdo()->prepare('DELETE FROM picture WHERE blog_posts_id = :id');
    $req->bindParam('id', $id);
    $req->execute();
}

function userArticle($id)
{
    $req = pdo()->prepare('SELECT user.email AS email
                            FROM user 
                            INNER JOIN blog_posts
                            ON user.id = blog_posts.author 
                            WHERE blog_posts.id = :id');
    $req->bindParam('id', $id);
    $req->execute();
    return $req;
}
