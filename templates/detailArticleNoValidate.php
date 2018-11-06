<?php $title = 'detail item no validate' ?>
<?php $style ='<link rel="stylesheet" href="http://projetcinq/css/detailArticleNoValidate.css" />' ?>

<!--body: Show the detail of an unreleased article-->
<?php ob_start(); ?>

<section class="validateArticle">
    <h3>Valider des articles:</h3>
    <?php foreach ($data as $key => $value) : ?>
        <p><?= $value->getTitle() ?></p>
        <p><?= $value->getChapo() ?></p>
        <p><?= $value->getFirstName() ?></p>
        <p><?= $value->getCreateDate() ?></p>
        <img src="http://projetcinq/img/imgPost/<?= $value->getNamePicture().'.'. $value->getExtentionPicture() ?>" alt="<?= $value->getDescriptionPicture() ?>" />
    <?php endforeach; ?>
</section>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>
