<?php

require __DIR__.'./actionResolver.php';

function handleRequest(array $request) {
  $routes = require __DIR__.'./../config/routes.php';

  foreach ($routes as $key => $value) {

    switch ($value) {
      case in_array($_SERVER['REQUEST_METHOD'], $value['method']):
          $params = catchParams($value['params'] ?? [], $request['REQUEST_URI'], $value['path']);
          if ($value['path'] === $request['REQUEST_URI'] && in_array($_SERVER['REQUEST_METHOD'], $value['method'])) {
            resolveAction($value['action'], $params  ?? []);
          }
          break;
    }
  }
}

function catchParams(array $params, string $path, &$routePath) {

  $results = [];

  foreach ($params as $key => $regex) {
    preg_match('#'.$regex.'#', $path, $result);
    if (is_null($result)) {

      return;
    }
    elseif (!empty($result)) {
      $routePath = strtr($routePath, ['{'.$key.'}' => $result[0]]);
      return $result;
    }
  } 
}
