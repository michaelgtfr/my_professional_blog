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
        <p><?= $returnMessages['title'] ?></p>
        <p><?= $returnMessages['chapo'] ?></p>
        <p><?= $returnMessages['name_author'] ?></p>
        <p><?= $returnMessages['create_date'] ?></p>
        <img src="http://projetcinq/img/imgPost/<?= $returnMessages['name_picture'].'.'. $returnMessages['extention_picture'] ?>" alt="<?= $returnMessages['description_picture'] ?>" />
        <a href="http://projetcinq/index.php/detailarticlenovalidate/<?= $returnMessages['id'] ?>" target="_blank">Voir l'article</a>
        <a href="http://projetcinq/index.php/validatearticle/<?= $returnMessages['id'] ?>">Valider l'article</a>
        <a href="http://projetcinq/index.php/deletearticle/<?= $returnMessages['id'] ?>">Refuser l'article</a>
        <?php
        break;
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