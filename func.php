<?php
if (! defined('AREA')) {
	die('Access denied');
}

/**
 *
 * @param string $controller        	
 * @param string $mode        	
 * @param string $action        	
 * @param string $dispatch_extra        	
 * @param string $area
 *        	'A' - admin.php area, 'C' - customer section
 */
function fn_deny_not_authenticated_before_dispatch($controller, $mode, $action, $dispatch_extra, $area)
{
	$auth = Tygh::$app['session']['auth'];
	
	if ($area == 'C' && empty($auth['user_id']) && ! in_array($controller, array(
		'auth',
		'profiles'
	))) {
		// If user is not logged in redirect to login page from not found page
		fn_redirect("auth.login_form");
	}
}

?>