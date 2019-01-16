<?php $content = ob_start(); ?>

<p><?=htmlspecialchars($data['message']); ?></p><br />
  
<p>L'email de la personne: <?=htmlspecialchars($data['email']).'
Date: Le ' .date('l j F \à Y H:i:s'); ?></p>

<?php $content = ob_get_clean(); ?>

<?php require('templateMessage.php'); ?>
