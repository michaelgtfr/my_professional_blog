<?php

require __DIR__.'./../src/controler/home.php';

function resolveAction(string $action, array $params = []) {
  call_user_func($action, $params);
}
