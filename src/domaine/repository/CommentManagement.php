<?php

require_once 'DbConnect.php';

class CommentManagement extends DbConnect
{
    public function detailComment($id)
    {
	    $req = $this->db->prepare('SELECT date_create, author, content 
            FROM comment WHERE blog_post_id = :id AND validation = 1');
	    $req->bindParam('id', $id);
	    $req->execute();

	    $comment = $req->fetchAll(PDO::FETCH_ASSOC);
	    return $comment;
    }

    public function addComment($author, $content, $email, $id)
    {
        $req = $this->db->prepare('INSERT INTO comment
            (blog_post_id, validation, date_create, author, email, content) 
            VALUES 
            (:blog_post_id, :validation, NOW(), :author, :email, :content)');
        $req->bindParam('blog_post_id', $id);
        $req->bindValue('validation', 0);
        $req->bindParam('author', $author);
        $req->bindParam('email', $email);
        $req->bindParam('content', $content);
        $req->execute();
    }

    public function commentRecovery()
    {

		$req = $this->db->query('SELECT * FROM comment WHERE validation = 0');
        $data = $req->fetchAll();
		return $data;
    }

    public function validationComment($id)
    {
    	$req = $this->db->prepare('UPDATE comment SET validation = 1 
                                WHERE id = :id');
    	$req->bindParam('id', $id);
    	$req->execute();
    }

    public function deletedComment($id)
    {
    	$req = $this->db->prepare('DELETE FROM comment WHERE id = :id');
    	$req->bindParam('id', $id);
    	$req->execute();
    }
}
