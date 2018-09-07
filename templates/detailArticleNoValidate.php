<?php $title = 'detail item no validate' ?>
<?php $style ='<link rel="stylesheet" href="http://projetcinq/css/articleManagement.css" />' ?>

<!--body-->
<?php ob_start(); ?>

<section class="validateArticle">
	<h3>Valider des articles:</h3>
	<?php 
        foreach ($returnMessages as $key => $value) {
        	?>
        	<p><?= $value['title'] ?></p>
        	<p><?= $value['chapo'] ?></p>
        	<p><?= $value['name_author'] ?></p>
        	<p><?= $value['create_date'] ?></p>
        	<img src="http://projetcinq/img/imgPost/<?= $value['name_picture'].'.'. $value['extention_picture'] ?>" alt="<?= $value['description_picture'] ?>" />
        	<?php
        }
	?>
</section>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>

}