<?php

function commentRecovery()
{

		$req = pdo()->query('SELECT * FROM comment WHERE validation = 0');
		return $req;
}

function validationComment($id)
{
    	$req = pdo()->prepare('UPDATE comment SET validation = 1 WHERE id = :id');
    	$req->bindParam('id', $id);
    	$req->execute();
}

function deletedComment($id)
{
    	$req = pdo()->prepare('DELETE FROM comment WHERE id = :id');
    	$req->bindParam('id', $id);
    	$req->execute();
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

        $reqId = $req->fetch();
        return $reqId;
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

    $reqArticle = $req->fetch(PDO::FETCH_ASSOC);
    return $reqArticle;
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

    $returnMessages = $req->fetch(PDO::FETCH_ASSOC);
    return $returnMessages;
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
    $email = $return->fetch();
    return $email;
}

function articleToBeAmended($id)
{
    $req = pdo()->prepare('SELECT blog_posts.id AS id,
                                blog_posts.title AS title,
                                blog_posts.chapo AS chapo,
                                blog_posts.content AS content,
                                picture.blog_posts_id AS id_picture, 
                                picture.name AS name_picture, 
                                picture.extention AS extention_picture, 
                                picture.description AS description_picture
                                FROM blog_posts
                                INNER JOIN picture
                                ON blog_posts.id = picture.blog_posts_id
                                WHERE blog_posts.id = :id');
    $req->bindParam('id', $id);
    $req->execute();

    $data = $req->fetch();
    return $data; 
}

function reqChangeRegister($blogPost, $title, $chapo, $content, $author)
{
    $req = pdo()->prepare('INSERT INTO blog_post_update(blog_post_id, author, title, chapo, content) VALUES(:blog_post_id, :author, :title, :chapo, :content)');
    $req->bindParam('blog_post_id', $blogPost);
    $req->bindParam('author', $author);
    $req->bindParam('title', $title);
    $req->bindParam('chapo', $chapo);
    $req->bindParam('content', $content);
    $req->execute();

    $req = pdo()->prepare('SELECT id FROM blog_post_update WHERE blog_post_id = :blog_post_id AND author = :author');
    $req->bindParam('blog_post_id', $blogPost);
    $req->bindParam('author', $author);
    $req->execute();

    $idPostUpdate = $req->fetch();
    return $idPostUpdate;
}

function reqAddIdPicture($blogPost, $idPostUpdate)
{
    $req = pdo()->prepare('UPDATE picture SET update_post_id = :update_post_id WHERE blog_posts_id = :blog_posts_id');
    $req->bindParam('blog_posts_id', $blogPost);
    $req->bindParam('update_post_id', $idPostUpdate);
    $req->execute();
}

function reqAddPicture($idPostUpdate, $description, $datePicture, $extensionUpload)
{
    $req = pdo()->prepare('INSERT INTO picture(update_post_id, blog_posts_id, name, extention, description) VALUES(:update_post_id, :blog_posts_id, :name, :extention, :description)');
    $req->bindParam('update_post_id', $idPostUpdate);
    $req->bindValue('blog_posts_id', NULL);
    $req->bindParam('name', $datePicture);
    $req->bindParam('extention', $extensionUpload);
    $req->bindParam('description', $description);
    $req->execute();
}

function recoverModifyArticle()
{
    $req = pdo()->query('SELECT blog_post_update.id AS id,
                            blog_post_update.blog_post_id AS id_blog_post,
                            blog_post_update.title AS title,
                            blog_post_update.chapo AS chapo,
                            picture.name AS name_picture,
                            picture.extention AS extention_picture,
                            picture.description AS description_picture,
                            user.first_name AS first_name
                            FROM blog_post_update
                            INNER JOIN picture
                            ON blog_post_update.id = picture.update_post_id
                            INNER JOIN user
                            ON blog_post_update.author = user.id');

    $reqArticle = $req->fetch(PDO::FETCH_ASSOC);
    return $reqArticle;
}

function validateTheModify($id)
{
    $req = pdo()->prepare('SELECT * FROM blog_post_update WHERE id = :id');
    $req->bindParam('id', $id);
    $req->execute();

    $newData = $req->fetch(PDO::FETCH_ASSOC);
    return $newData;
}

function modifyTheDonnees($params)
{
    $req = pdo()->prepare('UPDATE blog_posts SET author = :author,
                                                title = :title,
                                                chapo = :chapo,
                                                content = :content,
                                                date_update = NOW()
                            WHERE id = :blog_post_id');
    $req->bindParam('author', $params['author']);
    $req->bindParam('title', $params['title']);
    $req->bindParam('chapo', $params['chapo']);
    $req->bindParam('content', $params['content']);
    $req->bindParam('blog_post_id', $params['blog_post_id']);
    $req->execute();
}

function deleteTheModify($id)
{
    $req = pdo()->prepare('DELETE FROM blog_post_update WHERE id = :id');
    $req->bindParam('id', $id);
    $req->execute();
}

function recoveryPicture($id)
{
    $req = pdo()->prepare('SELECT blog_posts_id, name, extention FROM picture WHERE update_post_id = :id');
    $req->bindParam('id', $id);
    $req->execute();

    $verification = $req->fetch();
    return $verification;
}

function deletePicture($id)
{
    $req = pdo()->prepare('DELETE FROM picture WHERE update_post_id = :id');
    $req->bindParam('id', $id);
    $req->execute();
}

function modifyPicture($id)
{
    $req = pdo()->prepare('UPDATE picture SET update_post_id = NULL WHERE update_post_id = :id');
    $req->bindParam('id', $id);
    $req->execute();
}

function recoveryNameExtentionPicture($id)
{
   $req = pdo()->prepare('SELECT name, extention FROM picture WHERE blog_posts_id = :blog_posts_id');
    $req->bindParam('blog_posts_id', $id);
    $req->execute(); 

    $return = $req->fetch(PDO::FETCH_ASSOC);
    return $return;
}

function reqDeletedPicture($id)
{
    $req = pdo()->prepare('DELETE FROM picture WHERE blog_posts_id = :blog_posts_id');
    $req->bindParam('blog_posts_id', $id);
    $req->execute();
}

function reqModifyPicture($blog_posts_id, $id)
{
    $req = pdo()->prepare('UPDATE picture SET update_post_id = NULL,
                                blog_posts_id = :blog_posts_id WHERE update_post_id = :id');
    $req->bindParam('blog_posts_id', $blog_posts_id);
    $req->bindParam('id', $id);
    $req->execute();
}

function userAccountNoValidate()
{
    $req = pdo()->query('SELECT id, name, first_name, photo, presentation, date_create FROM user WHERE confirmation = 1 AND validation = 0');

    $return = $req->fetch(PDO::FETCH_ASSOC);
    return $return;
}

function reqUserAccountValidate($id)
{
    $req = pdo()->prepare('UPDATE user SET validation = 1 WHERE  id = :id');
    $req->bindParam('id', $id);
    $req->execute();
}

function reqUserEmailAccount($id)
{
    $req = pdo()->prepare('SELECT email FROM user WHERE id = :id');
    $req->bindParam('id', $id);
    $req->execute();

    $email = $req->fetch(PDO::FETCH_ASSOC);
    return $email;
}

function reqUserEmailAndPhotoAccount($id)
{
    $req = pdo()->prepare('SELECT email, photo FROM user WHERE id = :id');
    $req->bindParam('id', $id);
    $req->execute();

    $emailAndPhoto = $req->fetch(PDO::FETCH_ASSOC);
    return $emailAndPhoto;
}

function reqUserAccountReject($id)
{
    $req = pdo()->prepare('DELETE FROM user WHERE id = :id');
    $req->bindParam('id', $id);
    $req->execute();
}

function reqUpdateUserAccount($id, $name, $firstName, $email, $presentation, $photo)
{
    $req = pdo()->prepare('UPDATE user SET name = :name,
                                        first_name = :firstName,
                                        email = :email,
                                        presentation = :presentation,
                                        photo = :photo
                                        WHERE id = :id');
    $req->bindParam('name', $name);
    $req->bindParam('firstName', $firstName);
    $req->bindParam('email', $email);
    $req->bindParam('presentation', $presentation);
    $req->bindParam('photo', $photo);
    $req->bindParam('id', $id);
    $req->execute();
}
