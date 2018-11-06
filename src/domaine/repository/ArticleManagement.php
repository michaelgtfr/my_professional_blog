<?php

namespace MyModule\domaine\repository;

use MyModule\domaine\repository\DBConnect;

class ArticleManagement extends DBConnect
{
    public function countItems()
    {
        $req = $this->db->query('SELECT COUNT(*) AS total FROM blog_posts WHERE validate_blog_post = true'); 
        $Data = $req->fetch();
        return $Data;
    }

    public function listingOfArticles($firstEnter, $messagesByPage)
    {
		$req = $this->db->prepare('SELECT blog_posts.id AS id,
									blog_posts.title AS title,
									blog_posts.chapo AS chapo, 
									blog_posts.validate_blog_post AS validateBlogPost,
									blog_posts.author AS author, 
									picture.name AS namePicture, 
									picture.extention AS extentionPicture, 
									picture.description AS descriptionPicture,
                                    user.first_name AS firstName
			                        FROM blog_posts 
			                        INNER JOIN picture
			                        ON blog_posts.id = picture.blog_posts_id
                                    INNER JOIN user
                                    ON blog_posts.author = user.id
			                        WHERE validate_blog_post = true ORDER BY id 
			                        DESC LIMIT :firstEnter, :messagesByPage');

		$req->bindParam(':firstEnter', $firstEnter, \PDO::PARAM_INT);
		$req->bindParam(':messagesByPage', $messagesByPage, \PDO::PARAM_INT);
		$req->execute();

        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'MyModule\\entities\\Items');
        
        return $req->fetchAll();
    }

    public function articleDetail($id)
    {
	    $req = $this->db->prepare('SELECT blog_posts.id AS id,
									blog_posts.title AS title,
									blog_posts.chapo AS chapo,
									blog_posts.validate_blog_post AS validateBlogPost,
									blog_posts.author AS author,
									blog_posts.content AS content,
									blog_posts.date_update AS dateCreate,
									picture.blog_posts_id AS blogPostsIdPicture, 
									picture.name AS namePicture, 
									picture.extention AS extentionPicture, 
									picture.description AS descriptionPicture,
									user.first_name AS firstName
								FROM blog_posts
								INNER JOIN picture
								ON blog_posts.id = picture.blog_posts_id
								INNER JOIN user
								ON blog_posts.author = user.id  
								WHERE validate_blog_post = true 
								AND blog_posts.id = :id');
	    $req->bindParam(':id', $id, \PDO::PARAM_INT);
	    $req->execute();
		
        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'MyModule\\entities\\Items');

        return $req->fetch();
    }
 
    public function lastThreeAddition() 
    {
	    $req = $this->db->query('SELECT blog_posts.id AS id,
                                    blog_posts.author AS author,
                                    blog_posts.validate_blog_post AS validateBlogPost,
                                    blog_posts.title AS title,
                                    blog_posts.chapo AS chapo,
                                    blog_posts.content AS content,
                                    blog_posts.date_update AS dateUpdate,
                                    picture.name AS namePicture,
                                    picture.extention AS extentionPicture,
                                    picture.description AS descriptionPicture,
                                    user.first_name AS firstName
                                    FROM picture
                                    INNER JOIN blog_posts
                                    ON blog_posts.id = picture.blog_posts_id
                                    INNER JOIN user
                                    ON blog_posts.author = user.id 
                                    WHERE blog_posts.validate_blog_post = true 
                                    ORDER BY blog_posts.id DESC LIMIT 0,2');

        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'MyModule\\entities\\Items');

        return $req->fetchAll();
    }

    public function addArticle($id, $title, $chapo, $content)
    {
        $req = $this->db->prepare('INSERT INTO blog_posts(author,
                        validate_blog_post, title, chapo, content, 
                        date_update, date_create)
                        VALUES(:author, :validate_blog_post,
                         :title, :chapo, :content, NOW(), NOW())');
        $req->bindParam('author', $id);
        $req->bindValue('validate_blog_post', 0);
        $req->bindParam('title', $title);
        $req->bindParam('chapo', $chapo);
        $req->bindParam('content', $content);
        $req->execute();   
    }

    public function recoveryIdArticle($title, $chapo)
    {
        $req = $this->db->prepare('SELECT id FROM blog_posts 
        	                        WHERE title = :title AND chapo = :chapo');
        $req->bindParam('title', $title);
        $req->bindParam('chapo', $chapo);
        $req->execute();

        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'MyModule\\entities\\BlogPosts');

        return $req->fetch();
    }

    public function noValidateArticles()
    {
        $req = $this->db->query('SELECT blog_posts.id AS id,
                                blog_posts.title AS title,
                                blog_posts.chapo AS chapo,
                                blog_posts.validate_blog_post AS validateBlogPost,
                                blog_posts.author AS author,
                                blog_posts.content AS content,
                                blog_posts.date_update AS dateUpdate,
                                picture.blog_posts_id AS idPicture, 
                                picture.name AS namePicture, 
                                picture.extention AS extentionPicture, 
                                picture.description AS descriptionPicture,
                                user.first_name AS firstName,
                                user.email AS email
                                FROM blog_posts
                                INNER JOIN picture
                                ON blog_posts.id = picture.blog_posts_id
                                INNER JOIN user
                                ON blog_posts.author = user.id  
                                WHERE validate_blog_post = 0');

        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'MyModule\\entities\\Items');

        return $req->fetchAll();
    }

    public function reqArticleNoValidate($id)
    {
        $req = $this->db->prepare('SELECT blog_posts.id AS id,
                                blog_posts.title AS title,
                                blog_posts.chapo AS chapo,
                                blog_posts.validate_blog_post AS validateBlogPost,
                                blog_posts.author AS author,
                                blog_posts.content AS content,
                                blog_posts.date_update AS dateUpdate,
                                picture.blog_posts_id AS idPicture, 
                                picture.name AS namePicture, 
                                picture.extention AS extentionPicture, 
                                picture.description AS descriptionPicture,
                                user.first_name AS firstName
                                FROM blog_posts
                                INNER JOIN picture
                                ON blog_posts.id = picture.blog_posts_id
                                INNER JOIN user
                                ON blog_posts.author = user.id  
                                WHERE blog_posts.id = :id');
        $req->bindParam('id', $id);
        $req->execute();

        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'MyModule\\entities\\Items');

        return $req->fetch();
    }

    public function reqValidateArticle($id)
    {
        $req = $this->db->prepare('UPDATE blog_posts SET validate_blog_post = 1
                                    WHERE id = :id');
        $req->bindParam('id', $id);
        $req->execute();
    }

    public function reqDeleteArticle($id)
    {
        $req = $this->db->prepare('DELETE FROM blog_posts WHERE id = :id');
        $req->bindParam('id', $id);
        $req->execute();

        $req = $this->db->prepare('DELETE FROM picture 
        	                        WHERE blog_posts_id = :id');
        $req->bindParam('id', $id);
        $req->execute();
    }

    public function userArticle($id)
    {
        $req = $this->db->prepare('SELECT user.email AS email
                            FROM user 
                            INNER JOIN blog_posts
                            ON user.id = blog_posts.author 
                            WHERE blog_posts.id = :id');
        $req->bindParam('id', $id);
        $req->execute();

        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'MyModule\\entities\\Items');

        return $req->fetch();
    }

    public function articleToBeAmended($id)
    {
        $req = $this->db->prepare('SELECT blog_posts.id AS id,
                                blog_posts.title AS title,
                                blog_posts.chapo AS chapo,
                                blog_posts.content AS content,
                                picture.blog_posts_id AS idPicture, 
                                picture.name AS namePicture, 
                                picture.extention AS extentionPicture, 
                                picture.description AS descriptionPicture
                                FROM blog_posts
                                INNER JOIN picture
                                ON blog_posts.id = picture.blog_posts_id
                                WHERE blog_posts.id = :id');
        $req->bindParam('id', $id);
        $req->execute();

        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'MyModule\\entities\\Items');
        
        return $req->fetch(); 
    }

    public function modifyTheDonnees($params)
    {
        $req = $this->db->prepare('UPDATE blog_posts SET author = :author,
                                                title = :title,
                                                chapo = :chapo,
                                                content = :content,
                                                date_update = NOW()
                            WHERE id = :blog_post_id');
        $req->bindParam('author', $params->getAuthor());
        $req->bindParam('title', $params->getTitle());
        $req->bindParam('chapo', $params->getChapo());
        $req->bindParam('content', $params->getContent());
        $req->bindParam('blog_post_id', $params->getidBlogPost());
        $req->execute();
   }
}
