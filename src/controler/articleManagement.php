<?php

function articleManagement()
{
	$reqArticle = noValidateArticles();
	$message = 'Page de validation des articles';
	loadTemplate('articleManagement.php', array($reqArticle, $message));
}

function detailArticleNoValidate($params)
{
	$id = $params[0];
	$returnMessages = reqArticleNoValidate($id);
	loadTemplate('detailArticleNoValidate.php', $returnMessages);
}

function validateArticle($params)
{
	$id = $params[0];

    $email = userArticle($id);
    $to = $email[0];
    $subject = 'Validation de votre article';
    $message = 'Félicitation votre message a été valider, vous pouvez dès à présent voir votre article sur le blog.
    --------------
    Ceci est un email automatique, Merci de ne pas y répondre';
    sendEmail($to, $subject, $message);

	reqValidateArticle($id);
    $reqArticle = noValidateArticles();
    $message = 'Article Valider, vous pouvez continué à valider des articles.';
    loadTemplate('articleManagement.php', array($reqArticle, $message));
}

function deleteArticle($params)
{
	$id = $params[0];

	$email = userArticle($id);
    $to = $email[0];
    $subject = 'Refus de votre article';
    $message = 'Désoler votre message a été refusé. Pour plus de reponse sur ce refus vous pouvez dès a présent envoyer un message via le formualire de contact.
    --------------
    Ceci est un email automatique, Merci de ne pas y répondre';
    sendEmail($to, $subject, $message);

	$return =reqDeleteArticle($id);
	$reqArticle = noValidateArticles();
	$message = 'Article supprimer, vous pouvez continué à supprimer des articles.';
	loadTemplate('articleManagement.php', array($reqArticle, $message));
}
