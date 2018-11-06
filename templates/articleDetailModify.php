<?php $title = 'item detail' ?>
<?php $style ='<link rel="stylesheet" href="http://projetcinq/css/articleDetailModify.css" />' ?>

<!--body: Detail of the modification of an article-->
<?php ob_start(); ?>

	<h3><?= $data->getTitle() ?></h3>
	<p><img src="http://projetcinq/img/imgPost/<?= $data->getNamePicture() .'.'. $data->getExtentionPicture() ?>" alt="<?= $data->getDescriptionPicture() ?>" /></p>
	<p><?= $data->getChapo() ?></p>
	<p><?= $data->getContent() ?></p>
	<p><?= $data->getFirstName() ?></p>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>
