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
	    while ($data = $req->fetch()) {
        ?>
            <p><?= $data['author'] ?><p>
            <p><?= $data['date_create'] ?></p>
            <p><?= $data['content'] ?></p>
            <p><a href="http://projetcinq/index.php/validatecomment/<?= $data['id'] ?>">Valider le commentaire</a></p>
            <p><a href="http://projetcinq/index.php/deletecomment/<?= $data['id'] ?>">Refuser le commentaire</a></p>
            <a href="/index.php/articledetail/<?=$data['blog_post_id']?>">voir le detail</a>
        <?php
        }
        
	    $req->closeCursor();

	?>



<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>
