<?php $title = 'article detail' ?>
<?php $style ='<link rel="stylesheet" href="http://projetcinq/css/articleDetail.css" />' ?>

<!--body-->
<?php ob_start(); ?>
<section class="confirmation">
    <p>êtes vous sur de vouloir éffacer cette article</p>
    <a href="http://projetcinq/index.php/articledetail/<?= $returnMessages ?>">Annuler</a>
    <a href="http://projetcinq/index.php/postdeletedarticle/<?= $returnMessages ?>">Supprimer</a>
</section>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>

}
