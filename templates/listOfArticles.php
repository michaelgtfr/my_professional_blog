<?php $title = 'list of aticles' ?>


<?php $style='<link rel="stylesheet" href="css/listOfArticle.css" />' ?>

<!--body-->

<?php ob_start(); ?>


<?php
$reqMessages=$returnMessages[0];
while ($data = $reqMessages->fetch())
{			
?>

	<h3><?= $data['title'] ?></h3>
	<p><img src="img/imgPost/<?=$data['name_picture'].'.'.$data['extention_picture']?>" alt="<?= $data['description_picture'] ?>" /></p>
	<p><?= $data['chapo'] ?></p>
	<p><?= $data['author'] ?></p>
    <a href="/index.php/detailArticle/id=<?=$data['id']?>">voir le detail</a><br/>
					
<?php
}
$reqMessages->closeCursor ();



//lien des paginations
$currentPage=$returnMessages[2];
$numberOfPages=$returnMessages[1];
for($i=1; $i<=$numberOfPages; $i++){//On fait notre boucle
     //On va faire notre condition

    if($i==$currentPage) {//Si il s'agit de la page actuelle...
       
       	echo ' [ '.$i.' ] '; 
    } else { //Sinon...
     
        echo ' <a href="index.php/listofarticles/page='.$i.'">'.$i.'</a> ';
    }
}
?>



<?php $content = ob_get_clean(); ?>


<?php require __DIR__.'/template.php'; ?>
