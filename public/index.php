<?php
require __DIR__.'/../config/Dev.php';
require_once __DIR__.'/../vendor/autoload.php';

use MyApp\Router;
use MyApp\HTTP\HTTPRequest;
use MyApp\OPSession;

$request = HTTPRequest::createFromGlobals();
OPSession::start($request);

$app = new Router();
$app->handleRequest($request);
