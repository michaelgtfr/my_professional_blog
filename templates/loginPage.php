<?php $title = 'login page' ?>
<?php $style ='<link rel="stylesheet" href="http://projetcinq/css/loginPage.css" />' ?>

<!--body-->
<?php ob_start(); ?>

<!--texte ici-->
<section class="row">
	<h4>se connecter:</h4>
	<form action="postconnection.php" method="post" class="connection col-sm-offset-4 col-sm-4">
	<p>
		<div class="login col-sm-12 form-group">
			<label for="pseudo">Login : </label><input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="ex:coucou45" />
		</div>
		<div class="password col-sm-12 form-group">
			<label for="password">Mot de passe : </label><input type="password" name="password" id="password" class="form-control" value="ex: stml2134" />
		</div>
		<div class="validate col-sm-12 form-group">
			<input type="submit" name="validate" value="valider" />
		</div>
	</p>
	</form>
	<a href="index.php/registration" class="inscription col-sm-12">cliquer ici pour se s'inscrire</a>
</section>



<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>