<?php $title = 'item detail' ?>
<?php $style ='<link rel="stylesheet" href="http://projetcinq/css/dashboard.css" />' ?>

<!--body-->
<?php ob_start(); ?>

<section class="MyProfil">
    <h3>Mon profil :</h3>
    <img src="http://projetcinq/img/avatar/<?= $returnMessages['photo'] ?>" alt="photo de profil" />
    <p>Nom : <?= $returnMessages['name'] ?></p>
    <p>Prénom : <?= $returnMessages['first_name'] ?></p>
    <p>email : <?= $returnMessages['email'] ?></p>
    <p>présentation : <?= $returnMessages['presentation'] ?></p>
    <p>Compte créer le <?=$returnMessages['date_create'] ?></p>
</section>
<section class="menuEditor">
	<?php
	    if($returnMessages['role'] == 'administrateur') {
	    	?>
	        <a href="http://projetcinq/index.php/ValidateUserAccount">Valider un compte utilisateur</a>
	        <?php
	    }
	?>
	<a href="http://projetcinq/index.php/articlecreation">Créer un article</a>
	<?php
	    if($returnMessages['role'] == 'administrateur') {
	    	?>
	    	<a href="http://projetcinq/index.php/commentmanagement">Valider un commentaire</a>
	    	<a href="http://projetcinq/index.php/ValidatePost">Valider un article</a>
	    	<?php
	    }
	?>
</section>
<section class="contactformulaire">
	<Form action="Postformulaire.php" method="post">
		<h3>Formulaire de contact:</h3>
		<div>
		    <label for=message>Message :</label><textarea id=message>écrivez ici votre message</textarea>
		    <input type="hidden" name="name" value=<?= $returnMessages['name']?> />
		    <input type="hidden" name="email" value=<?= $returnMessages['email']?> />
		    <input type="hidden" name="role" value=<?= $returnMessages['role']?> />
		    <button type="submit">Valider</button>
		</div>
	</Form>
</section>
<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>
