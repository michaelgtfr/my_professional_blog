<?php

/**
*Configuration of the various pages of the site.
*/
return[
  'homepage' => [
    'path' => '/',
    'method' => ['GET'],
    'action' => 'MyModule\\controller\\Home',
  ],
  'list_of_articles' => [
    'path' => '/index.php/listofarticles/{page}',
    'method' => ['GET'],
    'action' => 'MyModule\\controller\\ListArticles',
    'params' => [
    'page' => '\d+'
    ]
  ],
  'article_detail' => [
    'path' => '/index.php/articledetail/{id}',
    'method' => ['GET'],
    'action' => 'MyModule\\controller\\DetailArticle',
    'params' => [
    'id' => '\d+'
    ]
  ],
  'login_page' => [
    'path' => '/index.php/loginpage',
    'method' => ['GET'],
    'action' => 'MyModule\\controller\\LoginPage',
  ],
  'registration_page' => [
    'path' => '/index.php/registrationpage',
    'method' => ['GET'],
    'action' => 'MyModule\\controller\\RegistrationPage',
  ],
  'post_connection' => [
    'path' => '/index.php/postconnection',
    'method' => ['GET', 'POST'],
    'action' => 'MyModule\\controller\\PostConnection',
  ],
  'post_registration' => [
    'path' => '/index.php/postregistration',
    'method' => ['GET', 'POST'],
    'action' => 'MyModule\\controller\\PostRegistration',
  ],
  'account_confirmation' => [
    'path' => '/index.php/accountConfirmation?{emailAndCle}',
    'method' => ['GET'],
    'action' => 'MyModule\\controller\\AccountConfirmation',
    'params' => [
    'emailAndCle' => 'activation.+'
    ]
  ],
  'email_reconfirmation' => [
    'path' => '/index.php/emailreconfirmation?{email}',
    'method' => ['GET'],
    'action' => 'MyModule\\controller\\EmailReconfirmation',
    'params' => [
    'email' => 'email=.+'
    ]
  ],
  'post_email_reconfirmation'=> [
    'path' => '/index.php/postEmailReconfirmation',
    'method' => ['GET', 'POST'],
    'action' => 'MyModule\\controller\\PostEmailReconfirmation',
  ],
  'reset_password' => [
    'path' =>'/index.php/resetpassword',
    'method' => ['GET'],
    'action' => 'MyModule\\controller\\ResetPassword',
  ],
  'post_reset_password' => [
    'path' => '/index.php/postresetpassword',
    'method' => ['GET', 'POST'],
    'action' => 'MyModule\\controller\\PostResetPassword',
  ],
  'comment_management' => [
    'path' => '/index.php/commentmanagement',
    'method' => ['GET'],
    'action' => 'MyModule\\controller\\CommentsManagement',
  ],
  'validate_comment' => [
    'path' => '/index.php/validatecomment?{id}',
    'method' => ['GET'],
    'action' => 'MyModule\\controller\\ValidateComment',
    'params' => [
    'id' => 'id=.+'
    ]
  ],
  'delete_comment' => [
    'path' => '/index.php/deletecomment?{id}',
    'method' => ['GET'],
    'action' => 'MyModule\\controller\\DeleteComment',
    'params' => [
    'id' => 'id=.+'
    ]
  ],
  'article_creation' => [
    'path' => '/index.php/articlecreation',
    'method' => ['GET'],
    'action' => 'MyModule\\controller\\ArticleCreation',
  ],
  'post_article_creation' => [
    'path' => '/index.php/postarticlecreation',
    'method' => ['GET', 'POST'],
    'action' => 'MyModule\\controller\\PostArticleCreation',
  ],
  'articles_management' => [
    'path' => '/index.php/articlesmanagement',
    'method' => ['GET'],
    'action' => 'MyModule\\controller\\ArticlesManagement',
  ],
  'detail_article_no_validate' => [
    'path' => '/index.php/detailarticlenovalidate/{id}',
    'method' => ['GET'],
    'action' => 'MyModule\\controller\\DetailArticleNoValidate',
    'params' => [
    'id' => '\d+'
    ]
  ],
  'validate_article' => [
    'path' => '/index.php/validatearticle?{id}',
    'method' => ['GET'],
    'action' => 'MyModule\\controller\\ValidateArticle',
    'params' => [
    'id' => 'id=.+'
    ]
  ],
  'delete_article' => [
    'path' => '/index.php/deletearticle?{id}',
    'method' => ['GET'],
    'action' => 'MyModule\\controller\\DeleteArticle',
    'params' => [
    'id' => 'id=.+'
    ]
  ],
  'deleted_article' => [
    'path' => '/index.php/deletedarticle/{id}',
    'method' => ['GET'],
    'action' => 'MyModule\\controller\\DeletedArticle',
    'params' => [
    'id' => '\d+'
    ]
  ],
  'post_deleted_message' => [
    'path' => '/index.php/postdeletedarticle/{id}',
    'method' => ['GET'],
    'action' => 'MyModule\\controller\\PostDeletedArticle',
    'params' => [
    'id' => '\d+'
    ]
  ],
  'modify_article' => [
    'path' => '/index.php/modifyarticle/{id}',
    'method' => ['GET'],
    'action' => 'MyModule\\controller\\ModifyArticle',
    'params' => [
    'id' => '\d+'
    ]
  ],
  'detail_modify_article' =>[
    'path' => '/index.php/detailarticlemodify/{id}',
    'method' => ['GET'],
    'action' => 'MyModule\\controller\\DetailArticleModify',
    'params' => [
    'id' => '\d+'
    ]
  ],
  'post_modify_article' => [
    'path' => '/index.php/postmodifyarticle',
    'method' => ['GET', 'POST'],
    'action' => 'MyModule\\controller\PostModifyArticle',
  ],
  'validate_change_article' => [
    'path' => '/index.php/validatechangearticle',
    'method' => ['GET'],
    'action' => 'MyModule\\controller\\ValidateChangeArticle',
  ],
  'validate_the_change' => [
    'path' => '/index.php/validatethechange?{id}',
    'method' => ['GET'],
    'action' => 'MyModule\\controller\\ValidateTheChange',
    'params' => [
    'id' => 'id=.+'
    ]
  ],
  'refuse_the_change' => [
    'path' => '/index.php/refusethechange?{id}',
    'method' => ['GET'],
    'action' => 'MyModule\\controller\\RefuseTheChange',
    'params' => [
    'id' => 'id=.+'
    ]
  ],
  'user_account_management' => [
    'path' => '/index.php/useraccountmanagement',
    'method' => ['GET'],
    'action' => 'MyModule\\controller\\UserAccountManagement',
  ],
  'user_account_validate' => [
    'path' => '/index.php/useraccountvalidate?{id}',
    'method' => ['GET'],
    'action' => 'MyModule\\controller\\UserAccountValidate',
    'params' => [
    'id' => 'id=.+'
    ]
  ],
  'user_account_reject' => [
    'path' => '/index.php/useraccountreject?{id}',
    'method' => ['GET'],
    'action' => 'MyModule\\controller\\UserAccountReject',
    'params' => [
    'id' => 'id=.+'
    ]
  ],
  'update_her_profil' => [
    'path' => '/index.php/updateherprofil/{id}',
    'method' => ['GET'],
    'action' => 'MyModule\\controller\\UpdateHerProfil',
    'params' => [
    'id' => '\d+'
    ]
  ],
  'post_update_her_profil' => [
    'path' => '/index.php/postupdateherprofil',
    'method' => ['GET','POST'],
    'action' => 'MyModule\\controller\\PostUpdateHerProfil',
  ],
  'contact_form' => [
    'path' => '/index.php/contactForm/{type}',
    'method' => ['GET', 'POST'],
    'action' => 'MyModule\\controller\\ContactForm',
    'params' => [
    'type' => '\d+'
    ]
  ],
  'form_comment' => [
    'path' => '/index.php/formcomment',
    'method' => ['GET', 'POST'],
    'action' => 'MyModule\\controller\\FormComment',
  ]
];
