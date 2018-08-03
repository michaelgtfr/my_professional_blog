<?php $title = 'item detail' ?>
<?php $style ='<link rel="stylesheet" href="http://projetcinq/css/emailReconfirmation.css" />' ?>

<!--body-->
<?php ob_start(); ?>

<section>
	<form action="/index.php/postresetpassword" method="post" />
		<p>
			<label for="email">email</label><input type="email" name="email" id="email" placeholder="ex: coucou@gmail.com" />
			<label for="name">nom:</label><input type="text" name="name" id="name" />
			<label for="passwordOne">nouveau mot de passe:</label><input type="password" name="passwordOne" id="passwordOne" />
			<label for="passwordTwo">ré-écrivez votre nouveau mot de passe:</label><input type="password" name=passwordTwo id="passwordTwo" /> 
		    <button>valider</button>
		</p>
	</form> 
</section>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>

}