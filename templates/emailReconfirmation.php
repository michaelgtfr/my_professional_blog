<?php $title = 'item detail' ?>
<?php $style ='<link rel="stylesheet" href="http://projetcinq/css/emailReconfirmation.css" />' ?>

<!--body-->
<?php ob_start(); ?>

<section>
	<form action="/index.php/postEmailReconfirmation" method="post" />
		<p>
			<label for="email">email</label><input type="email" name="email" id="email" value="<?= $returnMessages ?>" />
			<input type="hidden" name="previousEmail" value="<?=$returnMessages ?>" />
		    <button>valider</button>
		</p>
	</form> 
</section>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>

}
