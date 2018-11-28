<?php $content = ob_start(); ?>

<p>Désoler votre article a été refusé. Pour plus de reponse sur ce refus vous pouvez dès a présent envoyer un message via le formualire de contact.</p><br />
        <p>--------------</p><br />
        <p>Ceci est un email automatique, Merci de ne pas y répondre'</p>

<?php $content = ob_get_clean(); ?>

<?php require('templateMessage.php'); ?>
