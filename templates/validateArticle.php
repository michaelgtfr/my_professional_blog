<?php $content = ob_start(); ?>

<p>Félicitation votre message a été validé, vous pouvez dès à présent voir votre article sur le blog.</p><br />

    <p>--------------</p><br />
    <p>Ceci est un email automatique, Merci de ne pas y répondre</p>
  
<?php $content = ob_get_clean(); ?>

<?php require('templateMessage.php'); ?>
  
