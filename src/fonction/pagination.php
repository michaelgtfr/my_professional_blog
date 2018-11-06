<?php

namespace MyModule\fonction;

use MyModule\domaine\repository\ArticleManagement;
use MyModule\entities\Items;

class Pagination
{
	protected $reqMessages = [];
	protected $numberOfPages;
	protected $currentPage;

	function __construct($table, $params)
	{
		$messagesByPage = 5; 

		$count = new ArticleManagement;
		$totalReturn = $count->countItems();
		$total = $totalReturn['total']; 
		$this->numberOfPages = ceil($total/$messagesByPage);

    	if(isset($params)) {
        	$this->currentPage = intval($params[0]);

    	    if($this->currentPage>$this->numberOfPages) {    
       	    	$this->currentPage = $this->numberOfPages;
    	    }
	    } else {		
    	    $this->currentPage = 1;
	    }

	    $firstEnter = ($this->currentPage-1)*$messagesByPage; 
	    $reqMessages = new ArticleManagement;
	    $this->reqMessages = $reqMessages->listingOfArticles($firstEnter, $messagesByPage);

    }

    public function getReqMessage()
    {
    	return $this->reqMessages;
    }

    public function getNumberOfPages()
    {
    	return $this->numberOfPages;
    }

    public function getCurrentPage()
    {
    	return $this->currentPage;
    }
}
