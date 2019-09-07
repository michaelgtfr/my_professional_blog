<?php
namespace MyModule\domaine\repository;

use MyModule\domaine\repository\DBConnect;

/**
*Class containing all requests for comments.
*/
class CommentManagement extends DBConnect
{
    public function detailComment($idPost)
    {
        $req = $this->db->prepare('SELECT date_create AS dateCreateComment,
                                author AS authorComment,
                                content AS contentComment
                                FROM comment
                                WHERE blog_post_id = :id AND validation = 1');
        $req->bindParam('id', $idPost, \PDO::PARAM_INT);
        $req->execute();

        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'MyModule\\entities\\Comment');

        return $req->fetchAll();
    }

    public function addComment($author, $content, $email, $idPost)
    {
        $req = $this->db->prepare('INSERT INTO comment
            (blog_post_id, validation, date_create, author, email, content) 
            VALUES 
            (:blog_post_id, :validation, NOW(), :author, :email, :content)');
        $req->bindParam('blog_post_id', $idPost);
        $req->bindValue('validation', 0);
        $req->bindParam('author', $author);
        $req->bindParam('email', $email);
        $req->bindParam('content', $content);
        $req->execute();
    }

    public function commentRecovery()
    {
        $req = $this->db->query('SELECT id AS idComment, 
                                blog_post_id AS blogPostIdComment, 
                                date_create AS dateCreateComment,
                                author AS authorComment, 
                                email AS emailComment,
                                content AS contentComment
                                FROM comment WHERE validation = 0');

        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'MyModule\\entities\\Comment');

        return $req->fetchAll();
    }

    public function validationComment($idComment)
    {
        $req = $this->db->prepare('UPDATE comment SET validation = 1 
                                WHERE id = :id');
        $req->bindParam('id', $idComment);
        $req->execute();
    }

    public function deletedComment($idComment)
    {
        $req = $this->db->prepare('DELETE FROM comment WHERE id = :id');
        $req->bindParam('id', $idComment);
        $req->execute();
    }
}
