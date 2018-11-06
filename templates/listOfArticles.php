<?php $title = 'list of aticles' ?>
<?php $style ='<link rel="stylesheet" href="http://projetcinq/css/listOfArticle.css" />' ?>

<!--body: Displays the list of articles on the website-->
<?php ob_start(); ?>
<?php foreach ($data['message'] as $value) : ?>
	<h3><?= $value->getTitle() ?></h3>
	<p><img src="http://projetcinq/img/imgPost/<?= $value->getNamePicture().'.'.$value->getExtentionPicture()?>" alt="<?= $value->getDescriptionPicture() ?>" /></p>
	<p><?= $value->getChapo() ?></p>
	<p><?= $value->getFirstName() ?></p>
    <a href="/index.php/articledetail/<?= $value->getId() ?>">Voir le detail</a><br/>
<?php endforeach; ?>

<?php for ($i=1; $i<=$data['numberOfPages']; $i++) : ?>
	<?php if ($i==$data['currentPage']) : ?>      
       	<?= ' [ '.$i.' ] ' ?> 
    <?php else : ?>    
       	<?= '<a href="index.php/listofarticles/page='.$i.'">'.$i.'</a> ' ?>
    <?php endif; ?>
<?php endfor; ?>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>
