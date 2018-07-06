<?php

return[
  'homepage' => [
    'path' => '/',
    'method' => ['GET'],
    'action' => 'home'
  ],
  'listofarticles' => [
  	'path' => '/listofarticles/{page}',
  	'method' => ['GET'],
  	'action' => 'listArticles',
    'params' => [ 
    'page' => '\d+'
    ]
  ],
];