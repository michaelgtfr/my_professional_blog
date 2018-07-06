<?php $title = 'list of aticles' ?>


<?php $style='<link rel="stylesheet" href="css/listOfArticle.css" />' ?>

<!--body-->

<?php ob_start(); ?>


<?php

while ($data = $retour_messages->fetch()) 
			{
			?>
				<!--contenu-->
					
			<?php
			}
			$retour_messages->closeCursor ();
		}


//lien des paginations

		for($i=1; $i<=$nombreDePages; $i++) //On fait notre boucle
{
     //On va faire notre condition
     if($i==$pageActuelle) //Si il s'agit de la page actuelle...
     {
         echo ' [ '.$i.' ] '; 
     }	
     else //Sinon...
     {
          echo ' <a href="index.php?page='.$i.'">'.$i.'</a> ';
     }
}

?>



<?php $content = ob_get_clean(); ?>


<?php require __DIR__.'/template.php'; ?>