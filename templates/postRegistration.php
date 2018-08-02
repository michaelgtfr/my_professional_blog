<?php $title = 'success post Registration page' ?>
<?php $style ='<link rel="stylesheet" href="http://projetcinq/css/postRegistration.css" />' ?>

<?php ob_start(); ?>

<section class="message">
	<p>Félicitation, votre inscription est réussie il vous reste à le valider pour cela, cliquer sur le lien envoyé sur votre adresse email est aprés votre confirmation un administrateur doit approuver votre inscription.</p>
	<p>si le message n'a pas été envoyer <a href="http://projetCinq/index.php/emailreconfirmation?email=<?=$returnMessages?>">cliquer ici</a></p>
</section>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>