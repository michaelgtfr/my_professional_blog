<?php $title = 'item detail' ?>
<?php $style ='<link rel="stylesheet" href="http://projetcinq/css/message.css" />' ?>

<!--body-->
<?php ob_start(); ?>

<section>
	<p><?= $returnMessages; ?></p>
</section>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>

}
