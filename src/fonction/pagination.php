<?php

function pagination($table, $params){

$messagesByPage=5; 

$db = pdo();

$totalReturn= $db->query('SELECT COUNT(*) AS total FROM '. $table .''); 

$totalData= $totalReturn->fetch();
$total=$totalData['total']; 

$numberOfPages=ceil($total/$messagesByPage);

 
if(isset($params)) {
     $currentPage=intval($params);

    if($currentPage>$numberOfPages) {
     
        $currentPage=$numberOfPages;

     }
} else {
    $currentPage=1;

}

$firstEnter=($currentPage-1)*$messagesByPage; 

$reqMessages= listingOfArticles($firstEnter, $messagesByPage);

$returnMessages = array($reqMessages, $numberOfPages, $currentPage);

return $returnMessages;

}
