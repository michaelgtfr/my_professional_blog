<?php

function pagination($table, $params, $req){


$messagesParPage=5; //Nous allons afficher 5 messages par page.
 
//Une connexion SQL doit être ouverte avant cette ligne...
$db = pdo();

$retour_total= $db->prepare('SELECT COUNT(*) AS total FROM'. $table .''); //Nous récupérons le contenu de la requête dans $retour_total
$donnees_total= $retour_total->fetch(); //On range retour sous la forme d'un tableau.
$total=$donnees_total['total']; //On récupère le total pour le placer dans la variable $total.
 
//Nous allons maintenant compter le nombre de pages.
$nombreDePages=ceil($total/$messagesParPage);
 
if(isset($_GET['page'])) // Si la variable $_GET['page'] existe...
{
     $pageActuelle=intval($_GET['page']);
 
     if($pageActuelle>$nombreDePages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
     {
          $pageActuelle=$nombreDePages;
     }
}
else // Sinon
{
     $pageActuelle=1; // La page actuelle est la n°1    
}
 
$premiereEntree=($pageActuelle-1)*$messagesParPage; // On calcul la première entrée à lire
 
// La requête sql pour récupérer les messages de la page actuelle.
$retour_messages= $req;

$retour_messages = array($retour_messages, $i, $nombreDePages, $pageActuelle);

return $retour_messages;

}