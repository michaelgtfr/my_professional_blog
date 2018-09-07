<?php $title = 'list of aticles' ?>
<?php $style ='<link rel="stylesheet" href="http://projetcinq/css/listOfArticle.css" />' ?>

<!--body-->
<?php ob_start(); ?>

<?php
$data = $returnMessages[0];
foreach ($data as $key => $value) {			
?>
	<h3><?= $value['title'] ?></h3>
	<p><img src="http://projetcinq/img/imgPost/<?= $value['name_picture'].'.'.$value['extention_picture']?>" alt="<?= $value['description_picture'] ?>" /></p>
	<p><?= $value['chapo'] ?></p>
	<p><?= $value['author'] ?></p>
    <a href="/index.php/articledetail/<?=$value['id']?>">voir le detail</a><br/>
					
<?php
}

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
