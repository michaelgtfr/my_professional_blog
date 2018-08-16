<?php

require __DIR__.'./../src/controler/home.php';
require __DIR__.'./../src/controler/listArticles.php';
require __DIR__.'./../src/controler/articleDetail.php';
require __DIR__.'./../src/controler/loginPage.php';
require __DIR__.'./../src/controler/registrationPage.php';
require __DIR__.'./../src/controler/postconnection.php';
require __DIR__.'./../src/controler/postRegistration.php';
require __DIR__.'./../src/controler/accountConfirmation.php';
require __DIR__.'./../src/controler/emailReconfirmation.php';
require __DIR__.'./../src/controler/postEmailReconfirmation.php';
require __DIR__.'./../src/controler/resetPassword.php';
require __DIR__.'./../src/controler/postResetPassword.php';
require __DIR__.'./../src/controler/commentManagement.php';
require __DIR__.'./../src/controler/validateComment.php';
require __DIR__.'./../src/controler/deleteComment.php';
require __DIR__.'./../src/controler/articleCreation.php';
require __DIR__.'./../src/controler/postArticleCreation.php';
require __DIR__.'./../src/controler/articleManagement.php';
require __DIR__.'./../src/controler/deletedArticle.php';
require __DIR__.'./../src/controler/modifyArticle.php';
require __DIR__.'./../src/controler/validateChangeArticle.php';

function resolveAction(string $action, array $params = [])
{
  call_user_func($action, $params);
}
