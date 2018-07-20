<?php $title = 'item detail' ?>
<?php $style ='<link rel="stylesheet" href="http://projetcinq/css/articleDetail.css" />' ?>

<!--body-->
<?php ob_start(); ?>

<?php

while($data = $returnMessages->fetch()) {
?>
	<h3><?= $data['title']?></h3>
	<p><img src="http://projetcinq/img/imgPost/<?= $data['name_picture'] .'.'. $data['extention_picture']?>" alt="<?= $data['description_picture'] ?>" /></p>
	<p><?= $data['chapo']?></p>
	<p><?= $data['content']?></p>
	<p><?= $data['name_author'] ?></p>
	<p><?= $data['create_date'] ?></p>

<?php
}
$returnMessages->closeCursor();

?>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>

}
