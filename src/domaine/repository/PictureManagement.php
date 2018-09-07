<?php

require_once 'DbConnect.php';

class PictureManagement extends DbConnect
{
    public function photoJoin
    ($id, $datePicture, $extensionUpload, $description)
    {
        $req = $this->db->prepare('INSERT INTO picture
            (update_post_id, blog_posts_id, name, extention, description)
            VALUES(NULL, :blog_posts_id, :name, :extention, :description)');
        $req->bindParam('blog_posts_id', $id);
        $req->bindParam('name', $datePicture);
        $req->bindParam('extention', $extensionUpload);
        $req->bindParam('description', $description);
        $req->execute();
    }

    public function reqAddIdPicture($blogPost, $idPostUpdate)
    {
        $req = $this->db->prepare('UPDATE picture 
                                SET update_post_id = :update_post_id 
                                WHERE blog_posts_id = :blog_posts_id');
        $req->bindParam('blog_posts_id', $blogPost);
        $req->bindParam('update_post_id', $idPostUpdate);
        $req->execute();
    }

    public function reqAddPicture
    ($idPostUpdate, $description, $datePicture, $extensionUpload)
    {
        $req = $this->db->prepare('INSERT INTO picture(update_post_id,
                                blog_posts_id, name, extention, description) 
                                VALUES(:update_post_id, :blog_posts_id,
                                :name, :extention, :description)');
        $req->bindParam('update_post_id', $idPostUpdate);
        $req->bindValue('blog_posts_id', NULL);
        $req->bindParam('name', $datePicture);
        $req->bindParam('extention', $extensionUpload);
        $req->bindParam('description', $description);
        $req->execute();
    }

    public function recoveryPicture($id)
    {
        $req = $this->db->prepare('SELECT blog_posts_id, name, extention 
                                FROM picture WHERE update_post_id = :id');
        $req->bindParam('id', $id);
        $req->execute();

        $verification = $req->fetch();
        return $verification;
    }

    public function deletePicture($id)
    {
        $req = $this->db->prepare('DELETE FROM picture 
                                WHERE update_post_id = :id');
        $req->bindParam('id', $id);
        $req->execute();
    }

    public function modifyPicture($id)
    {
        $req = $this->db->prepare('UPDATE picture SET update_post_id = NULL 
                                WHERE update_post_id = :id');
        $req->bindParam('id', $id);
        $req->execute();
    }

    public function recoveryNameExtentionPicture($id)
    {
        $req = $this->db->prepare('SELECT name, extention FROM picture 
                                WHERE blog_posts_id = :blog_posts_id');
        $req->bindParam('blog_posts_id', $id);
        $req->execute(); 

        $return = $req->fetch(PDO::FETCH_ASSOC);
        return $return;
    }

    public function reqDeletedPicture($id)
    {
        $req = $this->db->prepare('DELETE FROM picture 
                                WHERE blog_posts_id = :blog_posts_id');
        $req->bindParam('blog_posts_id', $id);
        $req->execute();
    }

    public function reqModifyPicture($blog_posts_id, $id)
    {
        $req = $this->db->prepare('UPDATE picture SET update_post_id = NULL,
                                blog_posts_id = :blog_posts_id 
                                WHERE update_post_id = :id');
        $req->bindParam('blog_posts_id', $blog_posts_id);
        $req->bindParam('id', $id);
        $req->execute();
    }
}
