<?php

require __DIR__.'./../src/controler/home.php';
require __DIR__.'./../src/controler/listArticles.php';

function resolveAction(string $action, array $params = [])
{
  call_user_func($action, $params);
}
