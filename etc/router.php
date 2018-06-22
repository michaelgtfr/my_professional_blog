<?php

require __DIR__.'./actionResolver.php';

function handleRequest(array $request) {
  $routes = require __DIR__.'./../config/routes.php';

  foreach ($routes as $key => $value) {
    switch ($value) {
      case $value['path'] === $request['REQUEST_URI'] && in_array($_SERVER['REQUEST_METHOD'], $value['method']):
          resolveAction($value['action']);
          break;
    }
  }
}

function catchParams(string $params, string $path) {
  $param = preg_match($params, $path, $result);
  var_dump($param);
}
