<?php $title = 'Dashboard' ?>
<?php $style ='<link rel="stylesheet" href="http://projetcinq/css/dashboard.css" />' ?>

<!--body: Show the dashboard-->
<?php ob_start(); ?>

<section class="MyProfil">
    <h3>Mon profil :</h3>
    <img src="http://projetcinq/img/avatar/<?= $data->getPhoto() ?>" alt="photo de profil" />
    <p>Nom : <?= $data->getName() ?></p>
    <p>Prénom : <?= $data->getFirstName() ?></p>
    <p>email : <?= $data->getEmail() ?></p>
    <p>présentation : <?= $data->getPresentation() ?></p>
    <p>Compte créer le <?= $data->getDateCreate() ?></p>
    <a href="http://projetcinq/index.php/updateherprofil/<?= $data->getId() ?>">Modifier mon profil</a>
</section>
<section class="menuEditor">
	<?php if ($data->getRole() == 'administrateur') : ?>
	        <a href="http://projetcinq/index.php/useraccountmanagement">Valider un compte utilisateur</a>
	        <a href="http://projetcinq/index.php/validatechangearticle">Valider une modification des articles</a>
	<?php endif; ?>
	<a href="http://projetcinq/index.php/articlecreation">Créer un article</a>
	<?php if ($data->getRole() == 'administrateur') : ?>
	    	<a href="http://projetcinq/index.php/commentmanagement">Valider un commentaire</a>
	    	<a href="http://projetcinq/index.php/articlesmanagement">Valider un article</a>
	<?php endif; ?>
</section>
<section class="contactform">
	<Form action="/index.php/contactForm/2" method="post">
		<h3>Formulaire de contact:</h3>
		<div>
		    <label for=message>Message :</label><textarea name="message" id=message>écrivez ici votre message</textarea>
		    <input type="hidden" name="name" value=<?= $data->getName() ?> />
		    <input type="hidden" name="email" value=<?= $data->getEmail() ?> />
		    <input type="hidden" name="role" value=<?= $data->getRole() ?> />
		    <button type="submit">Valider</button>
		</div>
	</Form>
</section>
<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>
