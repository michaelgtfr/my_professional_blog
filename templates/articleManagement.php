<?php $title = 'item detail' ?>
<?php $style ='<link rel="stylesheet" href="http://projetcinq/css/articleManagement.css" />' ?>

<!--body-->
<?php ob_start(); ?>

<section class="validateArticle">
    <h3>Valider des articles:</h3>
    <p><?= $returnMessages[1]?></p>
    <?php
    $returnMessages = $returnMessages[0];
    if($returnMessages) {
    foreach ($returnMessages as $key => $value) {
        ?>
        <p><?= $value['title'] ?></p>
        <p><?= $value['chapo'] ?></p>
        <p><?= $value['name_author'] ?></p>
        <p><?= $value['create_date'] ?></p>
        <img src="http://projetcinq/img/imgPost/<?= $value['name_picture'].'.'. $value['extention_picture'] ?>" alt="<?= $value['description_picture'] ?>" />
        <a href="http://projetcinq/index.php/detailarticlenovalidate/<?= $value['id'] ?>" target="_blank">Voir l'article</a>
        <a href="http://projetcinq/index.php/validatearticle/<?= $value['id'] ?>">Valider l'article</a>
        <a href="http://projetcinq/index.php/deletearticle/<?= $value['id'] ?>">Refuser l'article</a>
        <?php
        }
    } else {
        ?>
        <p>Désoler il n'y a rien à valider</p>
        <?php
    }
    ?>
</section>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>

}
