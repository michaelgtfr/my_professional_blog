<?php $title = 'item detail' ?>
<?php $style ='<link rel="stylesheet" href="http://projetcinq/css/articleManagement.css" />' ?>

<!--body-->
<?php ob_start(); ?>

<section class="validateArticle">
	<h3>Valider des articles:</h3>
	<?php 
        foreach ($returnMessages as $key => $value) {
        	?>
        	<p><?= $returnMessages['title'] ?></p>
        	<p><?= $returnMessages['chapo'] ?></p>
        	<p><?= $returnMessages['name_author'] ?></p>
        	<p><?= $returnMessages['create_date'] ?></p>
        	<img src="http://projetcinq/img/imgPost/<?= $returnMessages['name_picture'].'.'. $returnMessages['extention_picture'] ?>" alt="<?= $returnMessages['description_picture'] ?>" />
        	<?php
        	break;
        }
	?>
</section>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>

}