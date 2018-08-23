<?php $title = 'item detail' ?>
<?php $style ='<link rel="stylesheet" href="http://projetcinq/css/updateHerProfil.css" />' ?>

<!--body-->
<?php ob_start(); ?>

<section>
    <h3>Modification du profil:</h3>
    <img src="http://projetcinq/img/avatar/<?= $returnMessages['photo'] ?>" alt="photo de profil" />
    <form action="/index.php/postupdateherprofil" method="post" enctype="multipart/form-data">
    	<label for="name">Nom:</label><input type="text" name="name" id="name" value="<?= $returnMessages['name'] ?>" />
    	<label for="firstName">prenom:</label><input type="text" name="firstName" id="firstName" value="<?= $returnMessages['first_name'] ?>" />
    	<label for="email">Email:</label><input type="email" name="email" id="email" value="<?= $returnMessages['email'] ?>" />
    	<label for="presentation">presentation:</label><input type="text" name="presentation" id="presentation" value="<?= $returnMessages['presentation'] ?>"/>
    	<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
	    <label for="photo">Photo/Logo (max 1Mo, JPG, PNG) : </label><input type="file" name="photo" id="photo" />
	    <input type="hidden" name="avatar" value="<?= $returnMessages['photo'] ?>" />
	    <button type="submit">Valider</button>
	</form>
</section>


<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>
