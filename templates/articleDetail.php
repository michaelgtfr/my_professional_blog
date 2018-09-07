<?php $title = 'item detail' ?>
<?php $style ='<link rel="stylesheet" href="/css/articleDetail.css" />' ?>

<!--body-->
<?php ob_start(); ?>

<?php
$article = $returnMessages[0];
$comment = $returnMessages[1];
if(isset($_SESSION ['id']) && isset($_SESSION['email']) && isset($_SESSION['role'])) {
	?>
	<nav class="adminNav">
		<div class="Modify">
			<a href="http://projetcinq/index.php/modifyarticle/<?= $article['id'] ?>">Modifier l'article</a>
		</div>
	<?php
    if($_SESSION['role'] == 'administrateur') {
	    ?>
		    <div class="deleted">
			    <a href="http://projetcinq/index.php/deletedarticle/<?=$article['id'] ?>">Supprimer l'article</a>
		    </div>
	    </nav>
	    <?php
    }
}
?>
<section class="article">
<?php
if(!empty($returnMessages[2])) {
    ?>
    <p><?= $returnMessages[2] ?>
    <?php
}

foreach($article as $key => $value) {
    ?>
	<h3><?= $article['title']?></h3>
	<p><img src="http://projetcinq/img/imgPost/<?= $article['name_picture'] .'.'. $article['extention_picture']?>" alt="<?= $article['description_picture'] ?>" /></p>
	<p><?= $article['chapo']?></p>
	<p><?= $article['content']?></p>
	<p><?= $article['name_author'] ?></p>
	<p><?= $article['create_date'] ?></p>
    <?php
    break;
}

?>
</section>
<section class="commentaire">
	<?php
	foreach($comment as $key => $values) {
	    ?>
            <p><?= $values['content'] ?></p>
            <p>Créé par <?= $values['author'] ?> le <?= $values['date_create'] ?></p>
	    <?php
    }
    ?>
</section>
<section class="formComment">
	<form action="/index.php/formcomment" method="post">
		<label for="author">Nom:</label><input type="text" name="author" id="author" />
		<label for="email">Email:</label><input type="email" name="email" id="email" />
		<label for="message">Message:</label><textarea id="message" name="message">écrivez votre texte ici</textarea>
		<input type="hidden" name="id" value="<?= $article['id'] ?>" />
		<button type="submit">Valider</button>
	</form> 
</section>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>

}
