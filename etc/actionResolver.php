<?php

require __DIR__.'./../src/controler/home.php';
require __DIR__.'./../src/controler/listArticles.php';
require __DIR__.'./../src/controler/articleDetail.php';
require __DIR__.'./../src/controler/loginPage.php';
require __DIR__.'./../src/controler/registrationPage.php';
require __DIR__.'./../src/controler/postconnection.php';

function resolveAction(string $action, array $params = [])
{
  call_user_func($action, $params);
}
