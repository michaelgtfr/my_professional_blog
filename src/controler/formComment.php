<?php

function formComment()
{
    $author = htmlspecialchars($_POST['author']);
    $content = htmlspecialchars($_POST['message']);
    $email = htmlspecialchars($_POST['email']);
    $id = htmlspecialchars($_POST['id']);

    addComment($author, $content, $email, $id);
    $message = 'Félicitation! votre message à été envoyer avec succés. Il doit être validé par un administrateur avant qu\'il soit affiché sur l\'article du blog';
    $data = articleDetail($id);
	$comment = detailComment($id);
	loadTemplate('articleDetail.php', array($data, $comment, $message));
}
