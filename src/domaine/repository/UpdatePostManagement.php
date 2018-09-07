<?php

require_once 'DbConnect.php';

class UpdatePostManagement extends DbConnect
{
	public function reqChangeRegister
	($blogPost, $title, $chapo, $content, $author)
    {
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
        	WHERE blog_post_id = :blog_post_id AND author = :author');
        $req->bindParam('blog_post_id', $blogPost);
        $req->bindParam('author', $author);
        $req->execute();

        $idPostUpdate = $req->fetch();
        return $idPostUpdate;
    }

    public function recoverModifyArticle()
    {
        $req = $this->db->query('SELECT blog_post_update.id AS id,
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

        $reqArticle = $req->fetchAll(PDO::FETCH_ASSOC);
        return $reqArticle;
    }

    public function articleDetailModify($id)
    {
        $req = $this->db->prepare('SELECT blog_post_update.id AS id,
                                    blog_post_update.title AS title,
                                    blog_post_update.chapo AS chapo,
                                    blog_post_update.author AS author,
                                    blog_post_update.content AS content,
                                    picture.update_post_id AS id_picture, 
                                    picture.name AS name_picture, 
                                    picture.extention AS extention_picture, 
                                    picture.description AS description_picture,
                                    user.id AS id_author,
                                    user.first_name AS name_author
                                FROM blog_post_update
                                INNER JOIN picture
                                ON blog_post_update.id = picture.update_post_id
                                INNER JOIN user
                                ON blog_post_update.author = user.id  
                                WHERE blog_post_update.id = :id');
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
    
        $data = $req->fetch();  
        return $data;
    }

    public function validateTheModify($id)
    {
        $req = $this->db->prepare('SELECT * FROM blog_post_update 
        	                        WHERE id = :id');
        $req->bindParam('id', $id);
        $req->execute();

        $newData = $req->fetch(PDO::FETCH_ASSOC);
        return $newData;
    }

    public function deleteTheModify($id)
    {
        $req = $this->db->prepare('DELETE FROM blog_post_update 
        	                        WHERE id = :id');
        $req->bindParam('id', $id);
        $req->execute();
    }
}
