<?php
namespace MyModule\domaine\repository;

use MyModule\domaine\repository\DBConnect;

/**
*Class containing all the requests concerning the photos.
*/
class PictureManagement extends DBConnect
{
    public function photoJoin(
        $idPost,
        $datePicture,
        $extensionUpload,
        $description
    ) {
        $req = $this->db->prepare('INSERT INTO picture
            (update_post_id, blog_posts_id, name, extention, description)
            VALUES(NULL, :blog_posts_id, :name, :extention, :description)');
        $req->bindParam('blog_posts_id', $idPost);
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

    public function reqAddPicture(
        $idPostUpdate,
        $description,
        $datePicture,
        $extensionUpload
    ) {
        $req = $this->db->prepare('INSERT INTO picture(update_post_id,
                                blog_posts_id, name, extention, description) 
                                VALUES(:update_post_id, :blog_posts_id,
                                :name, :extention, :description)');
        $req->bindParam('update_post_id', $idPostUpdate);
        $req->bindValue('blog_posts_id', null);
        $req->bindParam('name', $datePicture);
        $req->bindParam('extention', $extensionUpload);
        $req->bindParam('description', $description);
        $req->execute();
    }

    public function recoveryPicture($idPost)
    {
        $req = $this->db->prepare('SELECT blog_posts_id AS blogPostsIdPicture,
                                name AS namePicture,
                                extention AS extentionPicture 
                                FROM picture WHERE update_post_id = :id');
        $req->bindParam('id', $idPost);
        $req->execute();

        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'MyModule\\entities\\Picture');

        return $req->fetch();
    }

    public function deletePicture($idPost)
    {
        $req = $this->db->prepare('DELETE FROM picture 
                                WHERE update_post_id = :id');
        $req->bindParam('id', $idPost);
        $req->execute();
    }

    public function modifyPicture($idPost)
    {
        $req = $this->db->prepare('UPDATE picture SET update_post_id = NULL 
                                WHERE update_post_id = :id');
        $req->bindParam('id', $idPost);
        $req->execute();
    }

    public function recoveryNameExtentionPicture($idPost)
    {
        $req = $this->db->prepare('SELECT name AS namePicture,
                                extention AS extentionPicture FROM picture 
                                WHERE blog_posts_id = :blog_posts_id');
        $req->bindParam('blog_posts_id', $idPost);
        $req->execute();

        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'MyModule\\entities\\Picture');

        return $req->fetch();
    }

    public function reqDeletedPicture($idPost)
    {
        $req = $this->db->prepare('DELETE FROM picture 
                                WHERE blog_posts_id = :blog_posts_id');
        $req->bindParam('blog_posts_id', $idPost);
        $req->execute();
    }

    public function reqModifyPicture($blogPostsId, $idPost)
    {
        $req = $this->db->prepare('UPDATE picture SET update_post_id = NULL,
                                blog_posts_id = :blog_posts_id 
                                WHERE update_post_id = :id');
        $req->bindParam('blog_posts_id', $blogPostsId);
        $req->bindParam('id', $idPost);
        $req->execute();
    }
}
