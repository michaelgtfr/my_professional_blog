<?php $content = ob_start(); ?>

<p>Désoler! votre compte a été refuser,

        vous pouvez n'est en moins continuer à regarder et commenter les articles en cliquant ou en copiant l'url dans votre navigateur <a href ='http://projetcinq/'>http://projetcinq/</a>.</p><br />


        <p>--------------</p><br />
        <p>Ceci est un email automatique, Merci de ne pas y répondre</p>
 
<?php $content = ob_get_clean(); ?>

<?php require('templateMessage.php'); ?>
