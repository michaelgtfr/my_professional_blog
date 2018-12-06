<?php
namespace MyModule\domaine\repository;

use MyModule\domaine\repository\DBConnect;

/**
*Class containing all the requests concerning modified articles.
*/
class UpdatePostManagement extends DBConnect
{
    public function reqChangeRegister(
        $blogPost,
        $title,
        $chapo,
        $content,
        $author
    ) {
        $req = $this->db->prepare('INSERT INTO blog_post_update(blog_post_id,
            author, title, chapo, content) 
            VALUES(:blog_post_id, :author, :title, :chapo, :content)');
        $req->bindParam('blog_post_id', $blogPost);
        $req->bindParam('author', $author);
        $req->bindParam('title', $title);
        $req->bindParam('chapo', $chapo);
        $req->bindParam('content', $content);
        $req->execute();

        $req = $this->db->prepare('SELECT id FROM blog_post_update 
        	                    WHERE blog_post_id = :blog_post_id 
                                AND author = :author');
        $req->bindParam('blog_post_id', $blogPost);
        $req->bindParam('author', $author);
        $req->execute();

        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'MyModule\\entities\\User');

        return $req->fetch();
    }

    public function recoverModifyArticle()
    {
        $req = $this->db->query('SELECT blog_post_update.id AS id,
                            blog_post_update.blog_post_id AS idBlogPost,
                            blog_post_update.title AS title,
                            blog_post_update.chapo AS chapo,
                            picture.name AS namePicture,
                            picture.extention AS extentionPicture,
                            picture.description AS descriptionPicture,
                            user.first_name AS firstName
                            FROM blog_post_update
                            INNER JOIN picture
                            ON blog_post_update.id = picture.update_post_id
                            INNER JOIN user
                            ON blog_post_update.author = user.id');

        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'MyModule\\entities\\Items');

        return $req->fetchAll();
    }

    public function articleDetailModify($idPost)
    {
        $req = $this->db->prepare('SELECT blog_post_update.id AS id,
                                    blog_post_update.title AS title,
                                    blog_post_update.chapo AS chapo,
                                    blog_post_update.author AS author,
                                    blog_post_update.content AS content,
                                    picture.update_post_id AS idPicture, 
                                    picture.name AS namePicture, 
                                    picture.extention AS extentionPicture, 
                                    picture.description AS descriptionPicture,
                                    user.first_name AS firstName
                                FROM blog_post_update
                                INNER JOIN picture
                                ON blog_post_update.id = picture.update_post_id
                                INNER JOIN user
                                ON blog_post_update.author = user.id  
                                WHERE blog_post_update.id = :id');
        $req->bindParam(':id', $idPost, \PDO::PARAM_INT);
        $req->execute();

        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'MyModule\\entities\\Items');
      
        return $req->fetch();
    }

    public function validateTheModify($idPost)
    {
        $req = $this->db->prepare('SELECT blog_post_update.id AS id,
                                    blog_post_update.blog_post_id AS idBlogPost,
                                    blog_post_update.title AS title,
                                    blog_post_update.chapo AS chapo,
                                    blog_post_update.author AS author,
                                    blog_post_update.content AS content
                                    FROM blog_post_update 
        	                        WHERE id = :id');
        $req->bindParam('id', $idPost);
        $req->execute();

        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'MyModule\\entities\\Items');

        return $req->fetch();
    }

    public function deleteTheModify($idPost)
    {
        $req = $this->db->prepare('DELETE FROM blog_post_update 
        	                        WHERE id = :id');
        $req->bindParam('id', $idPost);
        $req->execute();
    }
}
