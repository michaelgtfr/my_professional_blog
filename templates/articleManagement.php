<?php $title = 'item detail' ?>
<?php $style ='<link rel="stylesheet" href="http://projetcinq/css/articleManagement.css" />' ?>

<!--body: Affiche les articles non validés-->
<?php ob_start(); ?>

<section class="validateArticle">
    <h3>Valider des articles:</h3>
    <p><?= $data['requete']->getSession('message')?></p>
    <?php if ($data['items']) : ?>
        <?php foreach ($data['items'] as $value) : ?>
            <p><?= $value->getTitle() ?></p>
            <p><?= $value->getChapo() ?></p>
            <p><?= $value->getFirstName() ?></p>
            <p><?= $value->getDateCreate() ?></p>
            <img src="http://projetcinq/img/imgPost/<?= $value->getNamePicture().'.'. $value->getExtentionPicture() ?>" alt="<?= $value->getDescriptionPicture() ?>" />
            <a href="http://projetcinq/index.php/detailarticlenovalidate/<?= $value->getId() ?>" target="_blank">Voir l'article</a>
            <a href="http://projetcinq/index.php/validatearticle/<?= $value->getId() ?>">Valider l'article</a>
            <a href="http://projetcinq/index.php/deletearticle/<?= $value->getId() ?>">Refuser l'article</a>
        <?php endforeach; ?>
    <?php else : ?>
        <p>Désoler il n'y a rien à valider</p>
    <?php endif; ?>
</section>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>
