<?php $title = 'item detail' ?>
<?php $style ='<link rel="stylesheet" href="http://projetcinq/css/articleDetail.css" />' ?>

<!--body-->
<?php ob_start(); ?>

<?php
if(isset($_SESSION ['id']) && isset($_SESSION['email']) && isset($_SESSION['role'])) {
	?>
	<nav class="adminNav">
		<div class="Modify">
			<a href="http://projetcinq/index.php/modifyarticle/<?= $returnMessages['id'] ?>">Modifier l'article</a>
		</div>
	<?php
    if($_SESSION['role'] == 'administrateur') {
	    ?>
		    <div class="deleted">
			    <a href="http://projetcinq/index.php/deletedarticle/<?=$returnMessages['id'] ?>">Supprimer l'article</a>
		    </div>
	    </nav>
	    <?php
    }
}

foreach($returnMessages as $key => $value) {
    ?>
	<h3><?= $returnMessages['title']?></h3>
	<p><img src="http://projetcinq/img/imgPost/<?= $returnMessages['name_picture'] .'.'. $returnMessages['extention_picture']?>" alt="<?= $returnMessages['description_picture'] ?>" /></p>
	<p><?= $returnMessages['chapo']?></p>
	<p><?= $returnMessages['content']?></p>
	<p><?= $returnMessages['name_author'] ?></p>
	<p><?= $returnMessages['create_date'] ?></p>
    <?php
    break;
}

?>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>

}
