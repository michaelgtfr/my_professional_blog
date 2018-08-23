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
  'account_confirmation' => [
    'path' => '/index.php/accountConfirmation?{emailAndCle}',
    'method' => ['GET'],
    'action' => 'accountConfirmation',
    'params' => [
    'emailAndCle' => 'activation.+'
    ]
  ],
  'email_reconfirmation' => [
    'path' => '/index.php/emailreconfirmation?{email}',
    'method' => ['GET'],
    'action' => 'emailReconfirmation',
    'params' => [
    'email' => 'email=.+'
    ]
  ],
  'post_email_reconfirmation'=> [
    'path' => '/index.php/postEmailReconfirmation',
    'method' => ['GET', 'POST'],
    'action' => 'postEmailReconfirmation'
  ],
  'reset_password' => [
    'path' =>'/index.php/resetpassword',
    'method' => ['GET'],
    'action' => 'resetPassword'
  ],
  'post_reset_password' => [
    'path' => '/index.php/postresetpassword',
    'method' => ['GET', 'POST'],
    'action' => 'postResetPassword'
  ],
  'comment_management' => [
    'path' => '/index.php/commentmanagement',
    'method' => ['GET'],
    'action' => 'commentManagement'
  ],
  'validate_comment' => [
    'path' => '/index.php/validatecomment/{id}',
    'method' => ['GET'],
    'action' => 'validateComment',
    'params' => [
    'id' => '\d+'
    ]
  ],
  'delete_comment' => [
    'path' => '/index.php/deletecomment/{id}',
    'method' => ['GET'],
    'action' => 'deleteComment',
    'params' => [
    'id' => '\d+'
    ]
  ],
  'article_creation' => [
    'path' => '/index.php/articlecreation',
    'method' => ['GET'],
    'action' => 'articleCreation'
  ],
  'post_article_creation' => [
    'path' => '/index.php/postarticlecreation',
    'method' => ['GET', 'POST'],
    'action' => 'postArticleCreation'
  ],
  'article_management' => [
    'path' => '/index.php/articlemanagement',
    'method' => ['GET'],
    'action' => 'articleManagement'
  ],
  'detail_article_no_validate' => [
    'path' => '/index.php/detailarticlenovalidate/{id}',
    'method' => ['GET'],
    'action' => 'detailArticleNoValidate',
    'params' => [
    'id' => '\d+'
    ]
  ],
  'validate_article' => [
    'path' => '/index.php/validatearticle/{id}',
    'method' => ['GET'],
    'action' => 'validateArticle',
    'params' => [
    'id' => '\d+'
    ]
  ],
  'delete_article' => [
    'path' => '/index.php/deletearticle/{id}',
    'method' => ['GET'],
    'action' => 'deleteArticle',
    'params' => [
    'id' => '\d+'
    ]
  ],
  'deleted_article' => [
    'path' => '/index.php/deletedarticle/{id}',
    'method' => ['GET'],
    'action' => 'deletedArticle',
    'params' => [
    'id' => '\d+'
    ]
  ],
  'post_deleted_message' => [
    'path' => '/index.php/postdeletedarticle/{id}',
    'method' => ['GET'],
    'action' => 'postDeletedArticle',
    'params' => [
    'id' => '\d+'
    ]
  ],
  'modify_article' => [
    'path' => '/index.php/modifyarticle/{id}',
    'method' => ['GET'],
    'action' => 'modifyArticle',
    'params' => [
    'id' => '\d+'
    ]
  ],
  'post_modify_article' => [
    'path' => '/index.php/postmodifyarticle',
    'method' => ['GET', 'POST'],
    'action' => 'postModifyArticle'
  ],
  'validate_change_article' => [
    'path' => '/index.php/validatechangearticle',
    'method' => ['GET'],
    'action' => 'validateChangeArticle'
  ],
  'validate_the_change' => [
    'path' => '/index.php/validatethechange/{id}',
    'method' => ['GET'],
    'action' => 'validateTheChange',
    'params' => [
    'id' => '\d+'
    ]
  ],
  'refuse_the_change' => [
    'path' => '/index.php/refusethechange/{id}',
    'method' => ['GET'],
    'action' => 'refuseTheChange',
    'params' => [
    'id' => '\d+'
    ]
  ],
  'user_account_management' => [
    'path' => '/index.php/useraccountmanagement',
    'method' => ['GET'],
    'action' => 'userAccountManagement'
  ],
  'user_account_validate' => [
    'path' => '/index.php/useraccountvalidate/{id}',
    'method' => ['GET'],
    'action' => 'userAccountValidate',
    'params' => [
    'id' => '\d+'
    ]
  ],
  'user_account_reject' => [
    'path' => '/index.php/useraccountreject/{id}',
    'method' => ['GET'],
    'action' => 'userAccountReject',
    'params' => [
    'id' => '\d+'
    ]
  ],
  'update_her_profil' => [
    'path' => '/index.php/updateherprofil/{id}',
    'method' => ['GET'],
    'action' => 'updateHerProfil',
    'params' => [
    'id' => '\d+'
    ]
  ],
  'post_update_her_profil' => [
    'path' => '/index.php/postupdateherprofil',
    'method' => ['GET','POST'],
    'action' => 'postUpdateHerProfil'
  ],
];
