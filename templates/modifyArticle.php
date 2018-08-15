<?php $title = 'item detail' ?>
<?php $style ='<link rel="stylesheet" href="http://projetcinq/css/modifyArticle.css" />' ?>

<!--body-->
<?php ob_start(); ?>
<section class="formulaire row">
	<h3 class="col-sm-12">Modification de l'article</h3>
	<form action="/index.php/postmodifyarticle" method="post" enctype="multipart/form-data">
		<div class="col-sm-6 form-group">
		    <label for="title">Titre:</label><input type="text" name="title" id="title" value="<?= $returnMessages['title'] ?>" />
		</div>
		<div class="col-sm-6 form-group">
		    <label for="chapo">Chapo:</label><input type="text" name="chapo" id="chapo" value="<?= $returnMessages['chapo'] ?>" />
		</div>
		<div class="col-sm-10 form-group">
		    <label for="content">Contenu:</label><textarea name="content" id="content" rows="10" cols="100"><?= $returnMessages['content'] ?></textarea>
	    </div>
	    <div class="col-sm-10 form-group">
		    <img src="http://projetcinq/img/imgPost/<?= $returnMessages['name_picture'].'.'.$returnMessages['extention_picture'] ?>"/>
		</div>
		<div class="col-sm-10 form-group">
		    <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
		    <label for="picture">Image (max: 2MO , JPG, PNG):</label><input type="file" name="picture" id="picture"/>
		</div>
		<div class="col-sm-10 form-group">
		    <label for="description">Description de la photo:</label><input type="text" name="description" id="description" value="<?= $returnMessages['description_picture'] ?>" />
		</div>
		<input type="hidden" name="author" value="<?= $_SESSION['id'] ?>" />
		<input type="hidden" name="blogPost" value="<?= $returnMessages['id'] ?>" />
		<button class="form-group" type="submit">Valider</button>
	</form>
</section>


<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>

}