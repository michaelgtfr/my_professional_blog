<?php $title = 'item detail' ?>
<?php $style ='<link rel="stylesheet" href="http://projetcinq/css/userAccountManagement.css" />' ?>

<!--body-->
<?php ob_start(); ?>

<?php
if(isset($_SESSION ['id']) && isset($_SESSION['email']) && $_SESSION['role'] == 'administrateur') {
    ?>
    <section>
        <p><?= $returnMessages[1] ?></p>
        <?php
        if($returnMessages[0] != null) {
        	$returnMessages = $returnMessages[0];
            foreach($returnMessages as $key => $value) {
                ?>
	            <img src="http://projetcinq/img/avatar/<?= $value['photo'] ?>" />
	            <p><?= $value['name']?></p>
	            <p><?= $value['first_name']?></p>
	            <p><?= $value['presentation'] ?></p>
	            <p><?= $value['date_create'] ?></p>
	            <a href="http://projetcinq/index.php/useraccountvalidate/<?= $value['id'] ?>">Valider le compte</a>
	            <a href="http://projetcinq/index.php/useraccountreject/<?= $value['id'] ?>">Refuser le compte</a>
                <?php
            }
        } else {
        	?>
        	<p>Désoler il y n'a rien à juger!</p>
        	<?php
        }
    ?>
    </section>
    <?php
}
?>


<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>
