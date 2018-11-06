<?php $title = 'item detail' ?>
<?php $style ='<link rel="stylesheet" href="/css/articleDetail.css" />' ?>

<!--body: Detail of an article-->
<?php ob_start(); ?>

<?php if ($data['request']->getSession('id') != null && $data['request']->getSession('email') != null && $data['request']->getSession('role') != null) : ?>
	<nav class="adminNav">
		<div class="Modify">
			<a href="http://projetcinq/index.php/modifyarticle/<?= $data['article']->getId() ?>">Modifier l'article</a>
		</div>
<?php endif; ?>
<?php if ($data['request']->getSession('role') == 'administrateur') : ?>
		    <div class="deleted">
			    <a href="http://projetcinq/index.php/deletedarticle/<?=$data['article']->getId() ?>">Supprimer l'article</a>
		    </div>
	    </nav>
<?php endif; ?>

<section class="article">
	<?php if (!empty($data['request']->getSession('message'))) : ?>
    	<p><?= $data['request']->getSession('message') ?>
	<?php endif; ?>

	<h3><?= $data['article']->getTitle()?></h3>
	<p><img src="http://projetcinq/img/imgPost/<?= $data['article']->getNamePicture() .'.'. $data['article']->getExtentionPicture() ?>" alt="<?= $data['article']->getDescriptionPicture() ?>" /></p>
	<p><?= $data['article']->getChapo() ?></p>
	<p><?= $data['article']->getContent() ?></p>
	<p><?= $data['article']->getFirstName() ?></p>
	<p><?= $data['article']->getDateCreate() ?></p>
</section>
<section class="commentaire">
	<?php foreach ($data['comment'] as $values) : ?>
        <p><?= $values->getContentComment() ?></p>
        <p>Créé par <?= $values->getAuthorComment() ?> le <?= $values->getDateCreateComment() ?></p>
	<?php endforeach; ?>
</section>
<section class="formComment">
	<form action="/index.php/formcomment" method="post">
		<label for="author">Nom:</label><input type="text" name="author" id="author" />
		<label for="email">Email:</label><input type="email" name="email" id="email" />
		<label for="message">Message:</label><textarea id="message" name="message">écrivez votre texte ici</textarea>
		<input type="hidden" name="id" value="<?= $data['article']->getId() ?>" />
		<button type="submit">Valider</button>
	</form> 
</section>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>

}
