<?php $title = 'item detail' ?>
<?php $style ='<link rel="stylesheet" href="http://projetcinq/css/commentManagement.css" />' ?>

<!--body-->
<?php ob_start(); ?>

<section class="tableau">                                            <!--francais-->
    <?php
        $message = $returnMessages[0];
        $req = $returnMessages[1];
    ?>
	<h3>Tableau de validation des commentaires:</h3>
    <p><?= $message ?></p>
	<?php
    if($req) {
	    foreach ($req as $key => $value) {
        ?>
            <p><?= $value['author'] ?><p>
            <p><?= $value['date_create'] ?></p>
            <p><?= $value['content'] ?></p>
            <p><a href="http://projetcinq/index.php/validatecomment/<?= $value['id'] ?>">Valider le commentaire</a></p>
            <p><a href="http://projetcinq/index.php/deletecomment/<?= $value['id'] ?>">Refuser le commentaire</a></p>
            <a href="/index.php/articledetail/<?= $value['blog_post_id'] ?>">Voir le detail</a>
        <?php
        }
    } else {
    ?>
        <p>Désoler il n'y a rien à juger!</p>
    <?php
    }
	?>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>
