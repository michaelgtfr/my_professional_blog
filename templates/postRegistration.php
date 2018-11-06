<?php $title = 'success post Registration page' ?>
<?php $style ='<link rel="stylesheet" href="http://projetcinq/css/postRegistration.css" />' ?>

<!--body: Page displaying the registration Success message plus a reconfirmation link of the email -->
<?php ob_start(); ?>

<section class="message">
	<p><?= $data->getSession('message') ?></p>
	<p>si le message n'a pas été envoyer <a href="http://projetCinq/index.php/emailreconfirmation?email=<?= $data->getPOST('email') ?>">cliquer ici</a></p>
</section>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>
