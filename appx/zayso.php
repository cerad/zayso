<?php
/*
Plugin Name: Zayso
Plugin URI: http://wordpress.org/extend/plugins/zayso/
Description: Zayso Referee Scheduling
Author: Art Hundiak
Version: 1.6
Author URI: http://ma.tt/
*/
/* ===========================
* Add a zayso admin page
*/
function zayso_admin_actions()
{
    add_options_page("Zayso Admin", "Zayso Admin", 'manage_options', "zayso-admin", "zayso_admin");
}
function zayso_admin()
{
    include 'zayso_admin_options.php';
}
add_action('admin_menu', 'zayso_admin_actions');

/* ==========================
* Just call this directly from a page?
* [zayso_project]
*/
function zayso_project($atts, $content = null)
{
    return sprintf('<h2>Zayso Project %s</h2>',get_option('zayso_project'));
}
add_shortcode('zayso_project','zayso_project');

/* ===========================================================
 * Generic short code processor
 */
add_shortcode('zayso_fragment','zayso_action_fragment');

function zayso_save_cookies_from_response($response)
{
    
  //$_SESSION['cookies'] = $response['cookies'];
    $_SESSION['time'] = time();
    foreach($response['cookies'] as $cookie)
    {
        $_SESSION['cookie_' . $cookie->name] = array('name' => $cookie->name, 'value' => $cookie->value, 'path' => $cookie->path);
    } 
}
function zayso_load_cookies()
{
    $cookies = array();
    foreach($_SESSION as $key => $value)
    {
        if (strpos($key,'cookie_') === 0)
        {
            $cookies[] = new WP_Http_Cookie($value);
        }
    }
    return $cookies;
}
function zayso_action_fragment($args)
{
    $host = get_option('zayso_host');
    $path = $args['path'];
    
    // Send any cookies
    $argsx = array('cookies' => zayso_load_cookies());

    $response = wp_remote_get($host . $path, $argsx);
    
    // Just save the cookies for now
    zayso_save_cookies_from_response($response);
    
    if (200 == $response['response']['code']) return $response['body'];
    
    return sprintf("Fragment Error for %s %d",$path,$response['response']['code']);
}

// Intercept certain posts
add_filter ( 'do_parse_request', 'zayso_filter_parse_request', 1, 3 );

function zayso_filter_parse_request($bool,$wp,$extra)
{
    $zayso_routes = array(
        '/volunteer/plan/form' => '/referee-page/',
        '/signin-check'        => '/volunteer-home/'
    );
    
    // Is it a zayso route
    $uri = $_SERVER['REQUEST_URI'];
    if (!isset($zayso_routes[$uri])) return $bool;
    $wp_uri  = $zayso_routes[$uri];
    
    // Is it a post?
    if (!isset($_SERVER['REQUEST_METHOD']) || $_SERVER['REQUEST_METHOD'] != 'POST') 
    {
        // Redirect on GET
        wp_redirect($wp_uri); exit();
    }
    
    // Send the post on
    $args = array('body' => $_POST, 'cookies' => zayso_load_cookies());

    $response = wp_remote_post(get_option('zayso_host') . $uri, $args);
print_r($response); exit();    
    zayso_save_cookies_from_response($response);
    
    // For now just redirect but want to check for errors
    wp_redirect($wp_uri); exit();
}
function zayso_session_start()
{
    if (!session_id()) session_start();
    
    //die('session_start ' . session_id());
}
add_action('init','zayso_session_start',1);
?>
