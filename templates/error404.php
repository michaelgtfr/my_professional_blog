<!-- head -->
<?php $title = "error 404 page" ?>

<?php $style = '<link rel="stylesheet" href="http://projetcinq/css/error404.css" />' ?>

<!--body-->

<?php ob_start(); ?>

<section>
	<p>Désoler met votre page n'existe pas!</p>
</section>

<?php $content = ob_get_clean(); ?>


<?php require __DIR__.'/template.php'; ?>