<?php $title = 'item detail' ?>
<?php $style ='<link rel="stylesheet" href="http://projetcinq/css/articleDetail.css" />' ?>

<!--body-->
<?php ob_start(); ?>

<?php
foreach($returnMessages as $key => $value) {
    ?>
	<h3><?= $returnMessages['title']?></h3>
	<p><img src="http://projetcinq/img/imgPost/<?= $returnMessages['name_picture'] .'.'. $returnMessages['extention_picture']?>" alt="<?= $returnMessages['description_picture'] ?>" /></p>
	<p><?= $returnMessages['chapo']?></p>
	<p><?= $returnMessages['content']?></p>
	<p><?= $returnMessages['name_author'] ?></p>
    <?php
    break;
}

?>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>

}
