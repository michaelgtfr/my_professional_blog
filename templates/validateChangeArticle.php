<?php $title = 'Change article page' ?>
<?php $style ='<link rel="stylesheet" href="http://projetcinq/css/validateChangeArticle.css" />' ?>

<!--body: Page showing the posted items-->
<?php ob_start(); ?>

<section>
	<p><?= $data['request']->getSession('message') ?></p>
	<?php
	if (!empty($returnMessages['article'])) : ?>
	    <?php foreach($data['article'] as $key => $value) : ?>
            <p>Auteur: <?= $value->getFirstName() ?></p>
            <p>Titre: <?= $value->getTitle() ?></p>
            <p>Chapo: <?= $value->getChapo() ?></p>
            <img src="http://projetcinq/img/imgPost/<?= $value['name_picture'].'.'. $value->getExtentionPicture() ?>" alt="<?= $value->getDescriptionPicture() ?>"/>
            <a href="http://projetcinq/index.php/detailarticlemodify/<?= $value->getId() ?>" target="_blank">Voir l'article modifié</a>
            <a href="http://projetcinq/index.php/articledetail/<?= $value->getIdBlogPost() ?>"" target="_blank">Voir l'article</a>
            <p>Description de l'image: <?= $value->getDescriptionPicture() ?></p>
            <a href="http://projetcinq/index.php/validatethechange/<?= $value->getId() ?>" >Valider le changement</a>
            <a href="http://projetcinq/index.php/refusethechange/<?= $value->getId() ?>" >Refuser le changement</a>
        <?php endforeach; ?>
    <?php else : ?>
        <p>Désolé, il n'y a rien à valider!</p>
    <?php endif; ?>
</section>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>
