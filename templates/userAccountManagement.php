<?php $title = 'list of user account no validate' ?>
<?php $style ='<link rel="stylesheet" href="http://projetcinq/css/userAccountManagement.css" />' ?>

<!--body-->
<?php ob_start(); ?>

<section>
    <p><?= $data['request']->getSession('message') ?></p>
    <?php if ($data['user'] != null) : ?>
        <?php foreach($data['user'] as $value) : ?>
	        <img src="http://projetcinq/img/avatar/<?= $value->getPhoto() ?>" />
	        <p><?= $value->getName() ?></p>
	        <p><?= $value->getFirstName() ?></p>
	        <p><?= $value->getPresentation() ?></p>
	        <p><?= $value->getDateCreate() ?></p>
	        <a href="http://projetcinq/index.php/useraccountvalidate/<?= $value->getId() ?>">Valider le compte</a>
	        <a href="http://projetcinq/index.php/useraccountreject/<?= $value->getId() ?>">Refuser le compte</a>
        <?php endforeach; ?>
    <?php else : ?>
        <p>Désoler il y n'a rien à juger!</p>
    <?php endif; ?>
</section>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>
