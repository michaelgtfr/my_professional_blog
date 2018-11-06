<?php $title = 'deleted an article' ?>
<?php $style ='<link rel="stylesheet" href="http://projetcinq/css/deleteArticle.css" />' ?>

<!--body: Validation of an article deletion-->
<?php ob_start(); ?>
<section class="confirmation">
    <p>êtes vous sur de vouloir éffacer cet article</p>
    <a href="http://projetcinq/index.php/articledetail/<?= $returnMessages ?>">Annuler</a>
    <a href="http://projetcinq/index.php/postdeletedarticle/<?= $returnMessages ?>">Supprimer</a>
</section>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>

}
