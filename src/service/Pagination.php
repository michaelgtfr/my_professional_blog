<?php
namespace MyModule\service;

use MyModule\domaine\repository\ArticleManagement;
use MyModule\entities\Items;

/**
*Class allowing the pagination of the elements sent.
*/
class Pagination
{
    protected $reqMessages = [];
    protected $numberOfPages;
    protected $currentPage;

    public function __construct($params)
    {
        $messagesByPage = 5;

        $data = new ArticleManagement;
        $totalReturn = $data->countItems();
        $total = $totalReturn['total'];
        $this->numberOfPages = ceil($total/$messagesByPage);

        if (isset($params)) {
            $this->currentPage = intval($params[0]);

            if ($this->currentPage>$this->numberOfPages) {
                $this->currentPage = $this->numberOfPages;
            }
        } else {
            $this->currentPage = 1;
        }
        $firstEnter = ($this->currentPage-1)*$messagesByPage;
        $this->reqMessages = $data->listingOfArticles($firstEnter, $messagesByPage);
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
