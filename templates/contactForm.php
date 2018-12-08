<?php $content = ob_start(); ?>

<p><?=$data['message']?></p><br />
  
<p>L'email de la personne: <?=$data['email'].'
Date: Le ' .date('l j F \à Y H:i:s'); ?></p>

<?php $content = ob_get_clean(); ?>

<?php require('templateMessage.php'); ?>
