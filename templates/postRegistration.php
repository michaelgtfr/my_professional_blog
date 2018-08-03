<?php $title = 'success post Registration page' ?>
<?php $style ='<link rel="stylesheet" href="http://projetcinq/css/postRegistration.css" />' ?>

<?php ob_start(); ?>

<section class="message">
	<p><?=$returnMessages[1]?></p>
	<p>si le message n'a pas été envoyer <a href="http://projetCinq/index.php/emailreconfirmation?email=<?=$returnMessages[0]?>">cliquer ici</a></p>
</section>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>