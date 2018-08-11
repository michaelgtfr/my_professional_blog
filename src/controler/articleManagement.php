<?php

function articleManagement()
{
	$req = noValidateArticles();
	$reqArticle = $req->fetch(PDO::FETCH_ASSOC);
	$message = 'Page de validation des articles';
	$returnMessages = array($reqArticle, $message);
	loadTemplate('articleManagement.php', $returnMessages);
}

function detailArticleNoValidate($params)
{
	$id = $params[0];
	$req = reqArticleNoValidate($id);
	$returnMessages = $req->fetch(PDO::FETCH_ASSOC);
	loadTemplate('detailArticleNoValidate.php', $returnMessages);
}

function validateArticle($params)
{
	$id = $params[0];

    $return = userArticle($id);
    $email = $return->fetch();
    $to = $email[0];
    $subject = 'Validation de votre article';
    $message = 'Félicitation votre message a été valider, vous pouvez dès à présent voir votre article sur le blog.
    --------------
    Ceci est un email automatique, Merci de ne pas y répondre';
    sendEmail($to, $subject, $message);

	reqValidateArticle($id);
    $req = noValidateArticles();
    $reqArticle = $req->fetch(PDO::FETCH_ASSOC);
    $message = 'Article Valider, vous pouvez continué à valider des articles.';
    $returnMessages = array($reqArticle, $message);
    loadTemplate('articleManagement.php', $returnMessages);
}

function deleteArticle($params)
{
	$id = $params[0];

	$return = userArticle($id);
    $email = $return->fetch();
    $to = $email[0];
    $subject = 'Refus de votre article';
    $message = 'Désoler votre message a été refusé. Pour plus de reponse sur ce refus vous pouvez dès a présent envoyer un message via le formualire de contact.
    --------------
    Ceci est un email automatique, Merci de ne pas y répondre';
    sendEmail($to, $subject, $message);

	$return =reqDeleteArticle($id);
	$req = noValidateArticles();
	$reqArticle = $req->fetch(PDO::FETCH_ASSOC);
	$message = 'Article supprimer, vous pouvez continué à supprimer des articles.';
	$returnMessages = array($reqArticle, $message);
	loadTemplate('articleManagement.php', $returnMessages);
}
