<?php $title = 'item detail' ?>
<?php $style ='<link rel="stylesheet" href="http://projetcinq/css/commentManagement.css" />' ?>

<!--body: Displays uncommitted comments-->
<?php ob_start(); ?>

<section class="board">                                           
	<h3>Tableau de validation des commentaires:</h3>
    <p><?= $data['request']->getSession('message') ?></p>

	<?php if(!empty($data['comment'])) : ?>
	    <?php foreach ($data['comment'] as $key => $value) : ?>
            <p><?= $data->getAuthor() ?><p>
            <p><?= $data->getDateCreate() ?></p>
            <p><?= $data->getContent() ?></p>
            <p><a href="http://projetcinq/index.php/validatecomment/<?= $data->getId() ?>">Valider le commentaire</a></p>
            <p><a href="http://projetcinq/index.php/deletecomment/<?= $data->getId() ?>">Refuser le commentaire</a></p>
            <a href="/index.php/articledetail/<?= $data->getIdBlogPost() ?>">Voir le detail</a>
        <?php endforeach; ?>
    <?php else : ?>
        <p>Désoler il n'y a rien à juger!</p>
    <?php endif; ?>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>
