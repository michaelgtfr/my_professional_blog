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
  'login_page' => [
    'path' => '/index.php/loginpage',
    'method' => ['GET'],
    'action' => 'loginPage'
  ],
  'registration_page' => [
    'path' => '/index.php/registrationpage',
    'method' => ['GET'],
    'action' => 'registrationPage'
  ],
  'post_connection' => [
    'path' => '/index.php/postconnection',
    'method' => ['GET', 'POST'],
    'action' => 'postConnection'
  ],
  'post_registration' => [
    'path' => '/index.php/postregistration',
    'method' => ['GET', 'POST'],
    'action' => 'postRegistration'
  ],
  'accountConfirmation' => [
    'path' => '/index.php/accountConfirmation?{emailAndCle}',
    'method' => ['GET'],
    'action' => 'accountConfirmation',
    'params' => [
    'emailAndCle' => 'activation.+'
    ]
  ],
  'emailReconfirmation' => [
    'path' => '/index.php/emailreconfirmation?{email}',
    'method' => ['GET'],
    'action' => 'emailReconfirmation',
    'params' => [
    'email' => 'email=.+'
    ]
  ],
  'postEmailReconfirmation'=> [
    'path' => '/index.php/postEmailReconfirmation',
    'method' => ['GET', 'POST'],
    'action' => 'postEmailReconfirmation'
  ],
  'resetPassword' => [
    'path' =>'/index.php/resetpassword',
    'method' => ['GET'],
    'action' => 'resetPassword',
  ],
  'postResetPassword' => [
    'path' => '/index.php/postresetpassword',
    'method' => ['GET', 'POST'],
    'action' => 'postResetPassword',
  ],
];
