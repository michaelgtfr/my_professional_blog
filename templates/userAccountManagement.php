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
        if( $returnMessages[0] != null) {
        	$returnMessages = $returnMessages[0];
            foreach($returnMessages as $key => $value) {
                ?>
	            <img src="http://projetcinq/img/avatar/<?= $returnMessages['photo'] ?>" />
	            <p><?= $returnMessages['name']?></p>
	            <p><?= $returnMessages['first_name']?></p>
	            <p><?= $returnMessages['presentation'] ?></p>
	            <p><?= $returnMessages['date_create'] ?></p>
	            <a href="http://projetcinq/index.php/useraccountvalidate/<?= $returnMessages['id'] ?>">Valider le compte</a>
	            <a href="http://projetcinq/index.php/useraccountreject/<?= $returnMessages['id'] ?>">Refuser le compte</a>
                <?php
                break;
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
