<?php $title = 'Update her profil' ?>
<?php $style ='<link rel="stylesheet" href="http://projetcinq/css/updateHerProfil.css" />' ?>

<!--body-->
<?php ob_start(); ?>

<section>
    <h3>Modification du profil:</h3>
    <img src="http://projetcinq/img/avatar/<?= $data->getPhoto() ?>" alt="photo de profil" />
    <form action="/index.php/postupdateherprofil" method="post" enctype="multipart/form-data">
    	<label for="name">Nom:</label><input type="text" name="name" id="name" value="<?= $data->getName() ?>" />
    	<label for="firstName">prenom:</label><input type="text" name="firstName" id="firstName" value="<?= $data->getFirstName() ?>" />
    	<label for="email">Email:</label><input type="email" name="email" id="email" value="<?= $data->getEmail() ?>" />
    	<label for="presentation">presentation:</label><input type="text" name="presentation" id="presentation" value="<?= $data->getPresentation() ?>"/>
    	<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
	    <label for="photo">Photo/Logo (max 1Mo, JPG, PNG) : </label><input type="file" name="photo" id="photo" />
	    <input type="hidden" name="avatar" value="<?= $data->getphoto() ?>" />
	    <button type="submit">Valider</button>
	</form>
</section>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>
