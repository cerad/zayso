<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\HttpKernelInterface;

error_reporting(E_ALL);

function zayso_get_kernel()
{
    static $kernel = null;
    
    if ($kernel) return $kernel;
    
    // Pul the path from wp_options
    require_once __DIR__.'/../app/bootstrap.php.cache';
    require_once __DIR__.'/../app/AppKernel.php';
    
    $kernel = new AppKernel('dev', true);
    $kernel->loadClassCache();
    $kernel->boot();
    
    return $kernel;
}
function zayso_handle_volunteer_plan_form()
{
    $kernel = zayso_get_kernel();

    // /volunteer/plan/form
    $url = $kernel->getContainer()->get('router')->generate('cerad_zayso_volunteer_plan_form');
    
    $request = Request::create($url);
    
    // This ends up being a parameter to volunteerPlanFormAction
    $request->attributes->set('projectKey','AYSONatGames2014');
    
    $response = $kernel->handle($request,HttpKernelInterface::SUB_REQUEST);

    return $response->getContent();
}
if (!defined('WP_DEBUG'))
{
    echo zayso_handle_volunteer_plan_form() . "\n";
}
?>
