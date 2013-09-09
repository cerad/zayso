<?php
error_reporting(E_ALL);

define('CERAD_TOURN_SHOW_CONFIG','default');

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;

// If you don't want to setup permissions the proper way, just uncomment the following PHP line
// read http://symfony.com/doc/current/book/installation.html#configuration-and-setup for more information
//umask(0000);

require_once __DIR__.'/../../../cerad2/app/bootstrap.php.cache';
Debug::enable();
require_once __DIR__.'/../../../cerad2/app/AppKernel.php';

$kernel = new AppKernel('dev', true);
$kernel->loadClassCache();

Request::enableHttpMethodParameterOverride();
$request = Request::createFromGlobals();

$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
