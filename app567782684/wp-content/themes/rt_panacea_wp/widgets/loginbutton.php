<?php
/**
 * @package   gantry
 * @subpackage widgets
 * @version   1.2 August 21, 2011
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2011 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */ 
 
defined('GANTRY_VERSION') or die();

gantry_import('core.gantrywidget');

add_action('widgets_init', array("GantryWidgetLoginButton","init"));

class GantryWidgetLoginButton extends GantryWidget {
    var $short_name = 'loginbutton';
    var $wp_name = 'gantry_loginbutton';
    var $long_name = 'Gantry Login Button';
    var $description = 'Gantry Login Button Widget';
    var $css_classname = 'widget_gantry_loginbutton';
    var $width = 200;
    var $height = 400;

    function init() {
        register_widget("GantryWidgetLoginButton");
    }
    
    function render_widget_open($args, $instance){ ?>
		<div class="clear"></div>
	<?php
    }
    
    function render_widget_close($args, $instance){
    }
    
    function pre_render($args, $instance) {
    }
    
    function post_render($args, $instance) {
    }
    
    function render_title($args, $instance) {
    	global $gantry;
    	if($instance['title'] != '') :
    		echo $instance['title'];
    	endif;
    }

    function render($args, $instance){
        global $gantry, $current_user;
	    ob_start();
	    ?>
    	
    	<div id="<?php echo $this->id; ?>" class="widget <?php echo $this->css_classname; ?> rt-block">
	    	<div id="rt-login-button">
			<?php if(!is_user_logged_in()) : ?>
				<a href="#" class="buttontext" rel="rokbox[215 265][module=rt-popup]">
					<span><?php echo $instance['logintext']; ?></span>
				</a>
			<?php else : ?>
				<a href="<?php echo wp_logout_url(get_bloginfo('url')); ?>" class="buttontext">
					<span><?php echo $instance['logouttext']; ?> <?php echo $current_user->display_name; ?></span>
				</a>
			<?php endif; ?>
			</div>
			<div class="clear"></div>
		</div>
    	
	    <?php 
	    
	    echo ob_get_clean();
	
	}
}