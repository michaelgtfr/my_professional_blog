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