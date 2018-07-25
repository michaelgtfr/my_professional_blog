<?php $title = 'registration page' ?>
<?php $style ='<link rel="stylesheet" href="http://projetcinq/css/registrationPage.css" />' ?>

<!--body-->
<?php ob_start(); ?>

<section class="row">
	<form action="postRegistration.php" method="post" enctype="multipart/form-data" class="col-sm-4 col-sm-offset-4">
		<p>
			<div class="name form-group">
				<label for="name">Nom : </label><input type="text" name="name" id="name" class="form-control" placeholder="loka" />
			</div>
			<div class="firstname form-group">
				<label for="firstname">Prénom : </label><input type="text" name="firstname" id="firstname" class="form-control" placeholder="naomie" />
			</div>
			<div class="email form-group">
				<label for="email">Email : </label><input type="email" name="email" id="email" class="form-control" placeholder="coucou62@gmail.com" />
			</div>
			<div class="passwordOne form-group">
				<label for="passwordOne">Mot de passe : </label><input type="password" name="passwordOne" id="passwordOne" class="form-control" value="13245" />
			</div>
			<div class="passwordTwo form-group">
				<label for="passwordTwo">Réecrivez votre mot de passe : </label><input type="password" name="passwordTwo" id="passwordTwo" class="form-control" value="12345" />
			</div>
			<div class="photo form-group">
				<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
				<label for="photo">Photo/Logo (max 1Mo) : </label><input type="file" name="photo" class="form-control" />
			</div>
			<div class="presentation form-group">
				<label for="presentation">Présentation : </label><textarea class="form-control" id="message" rows="10" cols="50">Ecrivez votre présentation ici</textarea>
			</div>
			<div class="validate col-sm-12 form-group">
			<input type="submit" name="validate" value="valider" />
		</div>
	</p>
	</form>


<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>