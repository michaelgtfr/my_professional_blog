<?php $title = 'Change article page' ?>
<?php $style ='<link rel="stylesheet" href="http://projetcinq/css/validateChangeArticle.css" />' ?>

<?php ob_start(); ?>

<section>
	<p><?= $returnMessages[0] ?></p>
	<?php
	$returnMessages = $returnMessages[1];
	if($returnMessages) {
	    foreach($returnMessages as $key => $value) {
        ?>
            <p>Auteur: <?= $value['first_name'] ?></p>
            <p>Titre: <?= $value['title'] ?></p>
            <p>Chapo: <?= $value['chapo'] ?></p>
            <img src="http://projetcinq/img/imgPost/<?= $value['name_picture'].'.'. $value['extention_picture'] ?>" alt="<?= $value['description_picture'] ?>"/>
            <a href="http://projetcinq/index.php/detailarticlemodify/<?= $value['id'] ?>" target="_blank">Voir l'article modifié</a>
            <a href="http://projetcinq/index.php/articledetail/<?= $value['id_blog_post'] ?>"" target="_blank">Voir l'article</a>
            <p>Description de l'image: <?= $value['description_picture'] ?></p>
            <a href="http://projetcinq/index.php/validatethechange/<?= $value['id'] ?>" >Valider le changement</a>
            <a href="http://projetcinq/index.php/refusethechange/<?= $value['id'] ?>" >Refuser le changement</a>
        <?php
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