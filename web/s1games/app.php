<?php

define('CERAD_TOURN_SHOW_CONFIG','s1');

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;

require_once __DIR__.'/../../../aysos1games/app/bootstrap.php.cache';
Debug::enable();
require_once __DIR__.'/../../../aysos1games/app/AppKernel.php';

$kernel = new AppKernel('dev', true);
$kernel->loadClassCache();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
