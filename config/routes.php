<?php

return[
  'homepage' => [
    'path' => '/',
    'method' => ['GET'],
    'action' => 'home'
  ],
  'list_of_articles' => [
  	'path' => '/index.php/listofarticles/{page}',
  	'method' => ['GET'],
  	'action' => 'listArticles',
    'params' => [ 
    'page' => '\d+'
    ]
  ],
  'article_detail' => [
    'path' => '/index.php/articledetail/{id}',
    'method' => ['GET'],
    'action' => 'detailArticle',
    'params' => [
    'id' => '\d+'
    ]
  ],
];
