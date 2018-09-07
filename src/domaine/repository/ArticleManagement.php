<?php

require_once 'DbConnect.php';

class ArticleManagement extends DbConnect
{
    public function listingOfArticles($firstEnter, $messagesByPage)
    {
		$req = $this->db->prepare('SELECT blog_posts.id AS id,
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
			WHERE validate_blog_post = true ORDER BY id 
			DESC LIMIT :firstEnter, :messagesByPage');

		$req->bindParam(':firstEnter', $firstEnter, PDO::PARAM_INT);
		$req->bindParam(':messagesByPage', $messagesByPage, PDO::PARAM_INT);
		$req->execute();

		$data = $req->fetchAll();
		return $data;
    }

    public function articleDetail($id)
    {
	    $req = $this->db->prepare('SELECT blog_posts.id AS id,
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
								WHERE validate_blog_post = true 
								AND blog_posts.id = :id');
	    $req->bindParam(':id', $id, PDO::PARAM_INT);
	    $req->execute();
	
	    $data = $req->fetch();	
	    return $data;
    }
 
    public function lastThreeAddition() 
    {
	    $req = $this->db->query('SELECT blog_posts.id,
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

	    $data = $req->fetchAll();
	    return $data;
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

        $reqId = $req->fetch();
        return $reqId;
    }

    public function noValidateArticles()
    {
        $req = $this->db->query('SELECT blog_posts.id AS id,
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

        $reqArticle = $req->fetchAll();
        return $reqArticle;
    }

    public function reqArticleNoValidate($id)
    {
        $req = $this->db->prepare('SELECT blog_posts.id AS id,
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

        $returnMessages = $req->fetchAll(PDO::FETCH_ASSOC);
        return $returnMessages;
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
        $email = $return->fetch();
        return $email;
    }

    public function articleToBeAmended($id)
    {
        $req = $this->db->prepare('SELECT blog_posts.id AS id,
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

    public function modifyTheDonnees($params)
    {
        $req = $this->db->prepare('UPDATE blog_posts SET author = :author,
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
}
