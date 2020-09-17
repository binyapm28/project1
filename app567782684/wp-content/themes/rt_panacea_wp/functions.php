<?php
/**
 * @version   1.2 August 21, 2011
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2011 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
$active_plugins = get_option('active_plugins');
if (!in_array('gantry/gantry.php', $active_plugins)) {
    if (!is_admin()){
        add_filter('template_include', 'gantry_missing_nag', -10, 0);
    }
    else {
        add_action( 'admin_notices', 'gantry_admin_missing_nag' );
    }
}

function gantry_admin_missing_nag(){
    $msg = __('The active theme requires the Gantry Framework Plugin to be installed and active');
	echo "<div class='update-nag'>$msg</div>";
}

function gantry_missing_nag(){
    echo "This theme requires the Gantry Framework Plugin to be installed and active.";
    die(0);
}
?>