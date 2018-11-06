<?php

/**configuration des différentes page du site*/
return[
  'homepage' => [
    'path' => '/',
    'method' => ['GET'],
    'module' => 'MyModule\\Controller\\Home',
    'action' => '',
  ],
  'list_of_articles' => [
  	'path' => '/index.php/listofarticles/{page}',
  	'method' => ['GET'],
  	'module' => 'MyModule\\Controller\\ListArticles',
    'action' => '',
    'params' => [ 
    'page' => '\d+'
    ]
  ],
  'article_detail' => [
    'path' => '/index.php/articledetail/{id}',
    'method' => ['GET'],
    'module' => 'MyModule\\Controller\\DetailArticle',
    'action' => '',
    'params' => [
    'id' => '\d+'
    ]
  ],
  'login_page' => [
    'path' => '/index.php/loginpage',
    'method' => ['GET'],
    'module' => 'MyModule\\Controller\\LoginPage',
    'action' => '',
  ],
  'registration_page' => [
    'path' => '/index.php/registrationpage',
    'method' => ['GET'],
    'module' => 'MyModule\\Controller\\RegistrationPage',
    'action' => '',
  ],
  'post_connection' => [
    'path' => '/index.php/postconnection',
    'method' => ['GET', 'POST'],
    'module' => 'MyModule\\Controller\\PostConnection',
    'action' => '',
  ],
  'post_registration' => [
    'path' => '/index.php/postregistration',
    'method' => ['GET', 'POST'],
    'module' => 'MyModule\\Controller\\PostRegistration',
    'action' => '',
  ],
  'account_confirmation' => [
    'path' => '/index.php/accountConfirmation?{emailAndCle}',
    'method' => ['GET'],
    'module' => 'MyModule\\Controller\\AccountConfirmation',
    'action' => '',
    'params' => [
    'emailAndCle' => 'activation.+'
    ]
  ],
  'email_reconfirmation' => [
    'path' => '/index.php/emailreconfirmation?{email}',
    'method' => ['GET'],
    'module' => 'MyModule\\Controller\\EmailReconfirmation',
    'action' => '',
    'params' => [
    'email' => 'email=.+'
    ]
  ],
  'post_email_reconfirmation'=> [
    'path' => '/index.php/postEmailReconfirmation',
    'method' => ['GET', 'POST'],
    'module' => 'MyModule\\Controller\\PostEmailReconfirmation',
    'action' => '',
  ],
  'reset_password' => [
    'path' =>'/index.php/resetpassword',
    'method' => ['GET'],
    'module' => 'MyModule\\Controller\\ResetPassword',
    'action' => '',
  ],
  'post_reset_password' => [
    'path' => '/index.php/postresetpassword',
    'method' => ['GET', 'POST'],
    'module' => 'MyModule\\Controller\\PostResetPassword',
    'action' => '',
  ],
  'comment_management' => [
    'path' => '/index.php/commentmanagement',
    'method' => ['GET'],
    'module' => 'MyModule\\Controller\\CommentsManagement',
    'action' => '',
  ],
  'validate_comment' => [
    'path' => '/index.php/validatecomment/{id}',
    'method' => ['GET'],
    'module' => 'MyModule\\Controller\\ValidateComment',
    'action' => '',
    'params' => [
    'id' => '\d+'
    ]
  ],
  'delete_comment' => [
    'path' => '/index.php/deletecomment/{id}',
    'method' => ['GET'],
    'module' => 'MyModule\\Controller\\DeleteComment',
    'action' => '',
    'params' => [
    'id' => '\d+'
    ]
  ],
  'article_creation' => [
    'path' => '/index.php/articlecreation',
    'method' => ['GET'],
    'module' => 'MyModule\\Controller\\ArticleCreation',
    'action' => '',
  ],
  'post_article_creation' => [
    'path' => '/index.php/postarticlecreation',
    'method' => ['GET', 'POST'],
    'module' => 'MyModule\\Controller\\PostArticleCreation',
    'action' => '',
  ],
  'articles_management' => [
    'path' => '/index.php/articlesmanagement',
    'method' => ['GET'],
    'module' => 'MyModule\\Controller\\ArticlesManagement',
    'action' => '',
  ],
  'detail_article_no_validate' => [
    'path' => '/index.php/detailarticlenovalidate/{id}',
    'method' => ['GET'],
    'module' => 'MyModule\\Controller\\DetailArticleNoValidate',
    'action' => '',
    'params' => [
    'id' => '\d+'
    ]
  ],
  'validate_article' => [
    'path' => '/index.php/validatearticle/{id}',
    'method' => ['GET'],
    'module' => 'MyModule\\Controller\\ValidateArticle',
    'action' => '',
    'params' => [
    'id' => '\d+'
    ]
  ],
  'delete_article' => [
    'path' => '/index.php/deletearticle/{id}',
    'method' => ['GET'],
    'module' => 'MyModule\\Controller\\DeleteArticle',
    'action' => '',
    'params' => [
    'id' => '\d+'
    ]
  ],
  'deleted_article' => [
    'path' => '/index.php/deletedarticle/{id}',
    'method' => ['GET'],
    'module' => 'MyModule\\Controller\\DeletedArticle',
    'action' => '',
    'params' => [
    'id' => '\d+'
    ]
  ],
  'post_deleted_message' => [
    'path' => '/index.php/postdeletedarticle/{id}',
    'method' => ['GET'],
    'module' => 'MyModule\\Controller\\PostDeletedArticle',
    'action' => '',
    'params' => [
    'id' => '\d+'
    ]
  ],
  'modify_article' => [
    'path' => '/index.php/modifyarticle/{id}',
    'method' => ['GET'],
    'module' => 'MyModule\\Controller\\ModifyArticle',
    'action' => '',
    'params' => [
    'id' => '\d+'
    ]
  ],
  'detail_modify_article' =>[
    'path' => '/index.php/detailarticlemodify/{id}',
    'method' => ['GET'],
    'module' => 'MyModule\\Controller\\DetailArticleModify',
    'action' => '',
    'params' => [
    'id' => '\d+'
    ]
  ],
  'post_modify_article' => [
    'path' => '/index.php/postmodifyarticle',
    'method' => ['GET', 'POST'],
    'module' => 'MyModule\\Controller\PostModifyArticle',
    'action' => '',
  ],
  'validate_change_article' => [
    'path' => '/index.php/validatechangearticle',
    'method' => ['GET'],
    'module' => 'MyModule\\Controller\\ValidateChangeArticle',
    'action' => '',
  ],
  'validate_the_change' => [
    'path' => '/index.php/validatethechange/{id}',
    'method' => ['GET'],
    'module' => 'MyModule\\Controller\\ValidateTheChange',
    'action' => '',
    'params' => [
    'id' => '\d+'
    ]
  ],
  'refuse_the_change' => [
    'path' => '/index.php/refusethechange/{id}',
    'method' => ['GET'],
    'module' => 'MyModule\\Controller\\RefuseTheChange',
    'action' => '',
    'params' => [
    'id' => '\d+'
    ]
  ],
  'user_account_management' => [
    'path' => '/index.php/useraccountmanagement',
    'method' => ['GET'],
    'module' => 'MyModule\\Controller\\UserAccountManagement',
    'action' => '',
  ],
  'user_account_validate' => [
    'path' => '/index.php/useraccountvalidate/{id}',
    'method' => ['GET'],
    'module' => 'MyModule\\Controller\\UserAccountValidate',
    'action' => '',
    'params' => [
    'id' => '\d+'
    ]
  ],
  'user_account_reject' => [
    'path' => '/index.php/useraccountreject/{id}',
    'method' => ['GET'],
    'module' => 'MyModule\\Controller\\UserAccountReject',
    'action' => '',
    'params' => [
    'id' => '\d+'
    ]
  ],
  'update_her_profil' => [
    'path' => '/index.php/updateherprofil/{id}',
    'method' => ['GET'],
    'module' => 'MyModule\\Controller\\UpdateHerProfil',
    'action' => '',
    'params' => [
    'id' => '\d+'
    ]
  ],
  'post_update_her_profil' => [
    'path' => '/index.php/postupdateherprofil',
    'method' => ['GET','POST'],
    'module' => 'MyModule\\Controller\\PostUpdateHerProfil',
    'action' => '',
  ],
  'contact_form' => [
    'path' => '/index.php/contactForm/{type}',
    'method' => ['GET', 'POST'],
    'module' => 'MyModule\\Controller\\ContactForm',
    'action' => '',
    'params' => [
    'type' => '\d+'
    ]
  ],
  'form_comment' => [
    'path' => '/index.php/formcomment',
    'method' => ['GET', 'POST'],
    'module' => 'MyModule\\Controller\\FormComment',
    'action' => '',
  ]
];
