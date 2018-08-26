<?php $title = 'Change article page' ?>
<?php $style ='<link rel="stylesheet" href="http://projetcinq/css/validateChangeArticle.css" />' ?>

<?php ob_start(); ?>

<section>
	<p><?= $returnMessages[0] ?></p>
	<?php
	$returnMessages = $returnMessages[1];
	if($returnMessages == true) {
	    foreach($returnMessages as $key => $value) {
        ?>
            <p>Auteur: <?= $returnMessages['first_name'] ?></p>
            <p>Titre: <?= $returnMessages['title'] ?></p>
            <p>Chapo: <?= $returnMessages['chapo'] ?></p>
            <img src="http://projetcinq/img/imgPost/<?= $returnMessages['name_picture'].'.'. $returnMessages['extention_picture'] ?>" alt="<?= $returnMessages['description_picture'] ?>"/>
            <a href="http://projetcinq/index.php/detailarticlemodify/<?= $returnMessages['id'] ?>" target="_blank">Voir l'article modifié</a>
            <a href="http://projetcinq/index.php/articledetail/<?= $returnMessages['id_blog_post'] ?>"" target="_blank">Voir l'article</a>
            <p>Description de l'image: <?= $returnMessages['description_picture'] ?></p>
            <a href="http://projetcinq/index.php/validatethechange/<?=$returnMessages['id'] ?>" >Valider le changement</a>
            <a href="http://projetcinq/index.php/refusethechange/<?= $returnMessages['id'] ?>" >Refuser le changement</a>
        <?php
        break;
	    }
    } else {
    ?>
        <p>Désolé, il n'y a rien à valider!</p>
    <?php
}
?>
</section>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>