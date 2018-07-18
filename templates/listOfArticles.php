<?php $title = 'list of aticles' ?>
<?php $style='<link rel="stylesheet" href="http://projetcinq/css/listOfArticle.css" />' ?>

<!--body-->
<?php ob_start(); ?>

<?php
$reqMessages=$returnMessages[0];
while ($data = $reqMessages->fetch())
{			
?>

	<h3><?= $data['title'] ?></h3>
	<p><img src="http://projetcinq/img/imgPost/<?=$data['name_picture'].'.'.$data['extention_picture']?>" alt="<?= $data['description_picture'] ?>" /></p>
	<p><?= $data['chapo'] ?></p>
	<p><?= $data['author'] ?></p>
    <a href="/index.php/articledetail/<?=$data['id']?>">voir le detail</a><br/>
					
<?php
}
$reqMessages->closeCursor ();




$currentPage=$returnMessages[2];
$numberOfPages=$returnMessages[1];
for($i=1; $i<=$numberOfPages; $i++){

    if($i==$currentPage) {
       
       	echo ' [ '.$i.' ] '; 
    } else {
     
        echo ' <a href="index.php/listofarticles/page='.$i.'">'.$i.'</a> ';
    }
}
?>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>
