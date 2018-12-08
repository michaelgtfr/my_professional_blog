<?php $content = ob_start(); ?>

<p>Félicitation! votre compte a été valider,

        vous pouvez dès à présent vous connectez a votre compte utilisateur en cliquant ou en copiant l'url dans votre navigateur <a href='http://projetcinq/'>http://projetcinq/</a> .</p><br />


        <p>--------------</p><br />
        <p>Ceci est un email automatique, Merci de ne pas y répondre</p> 

<?php $content = ob_get_clean(); ?>

<?php require('templateMessage.php'); ?>
