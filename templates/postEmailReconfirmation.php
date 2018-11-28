<?php $content = ob_start(); ?>

<p>'bienvenue sur mon blog professionnel,

            Pour activer votre compte, veuillez cliquer sur le lien ci dessous ou copier/coller dans votre navigateur internet.

            http://projetCinq/index.php/accountConfirmation?activation=<?=urlencode($data['email']). '&cle='.urlencode($data['key'])?></p><br />

            <p>--------------</p><br />
            <p>Ceci est un email automatique, Merci de ne pas y répondre'</p>

<?php $content = ob_get_clean(); ?>

<?php require('templateMessage.php'); ?>
