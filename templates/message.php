<?php $title = 'message page' ?>
<?php $style ='<link rel="stylesheet" href="http://projetcinq/css/message.css" />' ?>

<!--body: Page of message-->
<?php ob_start(); ?>

<section>
	<p><?= $data->getSession('message'); ?></p>
</section>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>
