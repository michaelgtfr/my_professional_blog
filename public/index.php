<?php
require_once __DIR__.'/../vendor/autoload.php';

use MyApp\Router;
use MyApp\HTTP\HTTPRequest;

$request = HTTPRequest::createFromGlobals();

$app = new Router();
$app->handleRequest($request);
