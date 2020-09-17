<?php

/**
 * @version   1.18 April 14, 2011
 * @author    RocketTheme, LLC http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2011 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
/*
Plugin Name: RokTabs
Plugin URI: http://www.rockettheme.com
Description: RokTabs is a fully independent and incredibly flexible standalone version of the popular theme feature, RokSlide. That being, a widget that displays content in tabs that are scrollable and can rotate automatically.
Author: RocketTheme, LLC
Version: 1.18
Author URI: http://www.rockettheme.com
License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
*/

// Globals

global $roktabs_plugin_path, $roktabs_plugin_url, $platform;
$roktabs_plugin_path = dirname($plugin);
$roktabs_plugin_url = WP_PLUGIN_URL.'/'.basename($roktabs_plugin_path);

require(dirname(__FILE__).'/rokbrowser_check.php');

$browser_check = new RokBrowserCheck;
$platform = $browser_check->platform;

// Widget

class RokTabsWidget extends WP_Widget {

	// RocketTheme RokTabs Widget
	// Port by Jakub Baran

    function RokTabsWidget() {
    	$widget_ops = array('classname' => 'widget_roktabs', 'description' => 'RocketTheme RokTabs Widget');
    	$control_ops = array('width' => 300, 'height' => 400);
        $this->WP_Widget('widget-roktabs', 'RokTabs', $widget_ops, $control_ops);
    }

    function widget($args, $instance){
 		extract($args);
 		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title']);
 		$roktabs_width = empty($instance['roktabs_width']) ? '608' : $instance['roktabs_width'];
 		$roktabs_tabs_count = empty($instance['roktabs_tabs_count']) ? '5' : $instance['roktabs_tabs_count'];
 		$roktabs_cat = empty($instance['roktabs_cat']) ? 'uncategorized' : $instance['roktabs_cat'];
 		$roktabs_content = empty($instance['roktabs_content']) ? 'content' : $instance['roktabs_content'];
 		$roktabs_order = empty($instance['roktabs_order']) ? 'date' : $instance['roktabs_order'];
 		$roktabs_pos = empty($instance['roktabs_pos']) ? 'top' : $instance['roktabs_pos'];
 		$roktabs_tabs_prefixed = empty($instance['roktabs_tabs_prefixed']) ? 'false' : $instance['roktabs_tabs_prefixed'];
 		$roktabs_tabs_scrolling = empty($instance['roktabs_tabs_scrolling']) ? 'true' : $instance['roktabs_tabs_scrolling'];
 		$roktabs_duration = empty($instance['roktabs_duration']) ? '600' : $instance['roktabs_duration'];
 		$roktabs_transition_type = empty($instance['roktabs_transition_type']) ? 'scrolling' : $instance['roktabs_transition_type'];
 		$roktabs_link_margin = empty($instance['roktabs_link_margin']) ? '0' : $instance['roktabs_link_margin'];
 		$roktabs_autoplay = empty($instance['roktabs_autoplay']) ? '0' : $instance['roktabs_autoplay'];
 		$roktabs_autoplay_delay = empty($instance['roktabs_autoplay_delay']) ? '2000' : $instance['roktabs_autoplay_delay'];
 		$roktabs_effect = empty($instance['roktabs_effect']) ? 'Quad.easeInOut' : $instance['roktabs_effect'];
 		$roktabs_mouse = empty($instance['roktabs_mouse']) ? 'click' : $instance['roktabs_mouse'];
 		$roktabs_show_icon = empty($instance['roktabs_show_icon']) ? '0' : $instance['roktabs_show_icon'];
 		$roktabs_icon_side = empty($instance['roktabs_icon_side']) ? 'left' : $instance['roktabs_icon_side'];

 		# Before the widget
 		echo $before_widget;

 		# The title
 		if ( $title )
 		echo $before_title . $title . $after_title;

  		# Content
  		
  		global $roktabs_plugin_path, $roktabs_plugin_url;
  		
  		$option = get_option('roktabs_options');
  		$theme = ' '.$option['theme'];
  		$activated_theme = get_option('template');
  		
  		$catid = get_category_by_slug($roktabs_cat);
  		
  		$plugin_remote = $roktabs_plugin_url;
		$plugin_local = $roktabs_plugin_path;
		$theme_remote = get_bloginfo('template_directory');
		$theme_local = ABSPATH.'wp-content/themes/'.$activated_theme;
		$wpcontent_remote = get_bloginfo('wpurl').'/wp-content';
		$wpcontent_local = ABSPATH.'wp-content';
		
		$icon_url_remote = $roktabs_plugin_url.'/icons/';
		$icon_url_local = $roktabs_plugin_path.'/icons/';
  		
  		if($option['icons_path'] != '') {
  			$icon_url_remote = $option['icons_path'];
	  		$icon_url_local = $option['icons_path'];
  		}
  		
  		$icon_url_remote = str_replace('__plugin__', $plugin_remote, $icon_url_remote);
  		$icon_url_local = str_replace('__plugin__', $plugin_local, $icon_url_local);
  		$icon_url_remote = str_replace('__theme__', $theme_remote, $icon_url_remote);
  		$icon_url_local = str_replace('__theme__', $theme_local, $icon_url_local);
  		$icon_url_remote = str_replace('__wp-content__', $wpcontent_remote, $icon_url_remote);
  		$icon_url_local = str_replace('__wp-content__', $wpcontent_local, $icon_url_local);
  		
  		if(substr($icon_url_remote, -1) != '/') : $icon_url_remote = $icon_url_remote.'/'; endif;
  		if(substr($icon_url_local, -1) != '/') : $icon_url_local = $icon_url_local.'/'; endif;
  		
  		$iconpath_exists = file_exists($icon_url_local);
  		
  		if($theme == 'custom') : $theme = ''; endif;
  		
  		global $more, $post;
  		
  		wp_reset_query();
  		
  		if(file_exists(TEMPLATEPATH.'/html/plugins/wp_roktabs/default.php')) :
  		
	  		require(TEMPLATEPATH.'/html/plugins/wp_roktabs/default.php');
	  	
	  	else :
	  	
	  		require(dirname(__FILE__).'/tmpl/default.php');
	  		
	  	endif;
	
    	# After the widget
    	echo $after_widget;
	}

    function update($new_instance, $old_instance) {
    
    	$instance = $old_instance;
    	$instance['title'] = stripslashes($new_instance['title']);
    	$instance['roktabs_width'] = stripslashes($new_instance['roktabs_width']);
    	$instance['roktabs_tabs_count'] = stripslashes($new_instance['roktabs_tabs_count']);
    	$instance['roktabs_cat'] = stripslashes($new_instance['roktabs_cat']);
    	$instance['roktabs_content'] = stripslashes($new_instance['roktabs_content']);
    	$instance['roktabs_order'] = stripslashes($new_instance['roktabs_order']);
    	$instance['roktabs_pos'] = stripslashes($new_instance['roktabs_pos']);
    	$instance['roktabs_tabs_prefixed'] = stripslashes($new_instance['roktabs_tabs_prefixed']);
    	$instance['roktabs_tabs_scrolling'] = stripslashes($new_instance['roktabs_tabs_scrolling']);
    	$instance['roktabs_duration'] = stripslashes($new_instance['roktabs_duration']);
    	$instance['roktabs_transition_type'] = stripslashes($new_instance['roktabs_transition_type']);
    	$instance['roktabs_link_margin'] = stripslashes($new_instance['roktabs_link_margin']);
    	$instance['roktabs_autoplay'] = stripslashes($new_instance['roktabs_autoplay']);
    	$instance['roktabs_autoplay_delay'] = stripslashes($new_instance['roktabs_autoplay_delay']);
    	$instance['roktabs_effect'] = stripslashes($new_instance['roktabs_effect']);
    	$instance['roktabs_mouse'] = stripslashes($new_instance['roktabs_mouse']);
    	$instance['roktabs_show_icon'] = stripslashes($new_instance['roktabs_show_icon']);
    	$instance['roktabs_icon_side'] = stripslashes($new_instance['roktabs_icon_side']);

 		return $instance;
	}

    function form($instance){
   		
   		//Defaults
   		
  		$instance = wp_parse_args( (array) $instance, array('title'=>'', 'roktabs_width'=>'608', 'roktabs_tabs_count'=>'5', 'roktabs_cat'=>'uncategorized', 'roktabs_content'=>'content', 'roktabs_order'=>'date', 'roktabs_pos'=>'top', 'roktabs_tabs_prefixed'=>'false', 'roktabs_tabs_scrolling'=>'true', 'roktabs_duration'=>'600', 'roktabs_transition_type'=>'scrolling', 'roktabs_link_margin'=>'0', 'roktabs_autoplay'=>'0', 'roktabs_autoplay_delay'=>'2000', 'roktabs_effect'=>'Quad.easeInOut', 'roktabs_mouse'=>'click', 'roktabs_show_icon'=>'0', 'roktabs_icon_side'=>'left') );

   		$title = htmlspecialchars($instance['title']);
   		$roktabs_cat = htmlspecialchars($instance['roktabs_cat']);
   		$roktabs_content = htmlspecialchars($instance['roktabs_content']);
   		$roktabs_width = htmlspecialchars($instance['roktabs_width']);
   		$roktabs_tabs_count = htmlspecialchars($instance['roktabs_tabs_count']);
   		$roktabs_order = htmlspecialchars($instance['roktabs_order']);
   		$roktabs_pos = htmlspecialchars($instance['roktabs_pos']);
   		$roktabs_tabs_prefixed = htmlspecialchars($instance['roktabs_tabs_prefixed']);
   		$roktabs_tabs_scrolling = htmlspecialchars($instance['roktabs_tabs_scrolling']);
   		$roktabs_duration = htmlspecialchars($instance['roktabs_duration']);
   		$roktabs_transition_type = htmlspecialchars($instance['roktabs_transition_type']);
   		$roktabs_link_margin = htmlspecialchars($instance['roktabs_link_margin']);
   		$roktabs_autoplay = htmlspecialchars($instance['roktabs_autoplay']);
   		$roktabs_autoplay_delay = htmlspecialchars($instance['roktabs_autoplay_delay']);
   		$roktabs_effect = htmlspecialchars($instance['roktabs_effect']);
   		$roktabs_mouse = htmlspecialchars($instance['roktabs_mouse']);
   		$roktabs_show_icon = htmlspecialchars($instance['roktabs_show_icon']);
   		$roktabs_icon_side = htmlspecialchars($instance['roktabs_icon_side']);

    	# Output the options
    	
    	$categories = get_terms('category', 'hide_empty=0&orderby=name');
    	
    	?>
    	
    	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'roktabs'); ?>&nbsp;
    	<input style="width: 270px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label>
    	<br /><br />
    	<label for="<?php echo $this->get_field_id('roktabs_cat'); ?>"><?php _e('Posts Category:', 'roktabs'); ?></label>&nbsp;
		<select name="<?php echo $this->get_field_name('roktabs_cat'); ?>" id="<?php echo $this->get_field_id('roktabs_cat'); ?>">
			<?php foreach ($categories as $cat) { ?>
				<option value="<?php echo $cat->slug; ?>"<?php if($roktabs_cat == $cat->slug) : echo ' selected="selected"'; endif; ?>><?php echo $cat->name; ?></option>
			<?php } ?>
		</select>
		<br /><br />
    	<label for="<?php echo $this->get_field_id('roktabs_content'); ?>"><?php _e('Type of Content :', 'roktabs'); ?></label>&nbsp;
    	<select id="<?php echo $this->get_field_id('roktabs_content'); ?>" name="<?php echo $this->get_field_name('roktabs_content'); ?>">
      		<option value="content"<?php selected( $instance['roktabs_content'], 'content' ); ?>><?php _e('Content', 'roktabs'); ?></option>
      		<option value="excerpt"<?php selected( $instance['roktabs_content'], 'excerpt' ); ?>><?php _e('Excerpt', 'roktabs'); ?></option>
        </select>
        <br /><br />
    	<label for="<?php echo $this->get_field_id('roktabs_order'); ?>"><?php _e('Order:', 'roktabs'); ?></label>&nbsp;
    	<select id="<?php echo $this->get_field_id('roktabs_order'); ?>" name="<?php echo $this->get_field_name('roktabs_order'); ?>">
      		<option value="author"<?php selected( $instance['roktabs_order'], 'author' ); ?>><?php _e('Author', 'roktabs'); ?></option>
      		<option value="date"<?php selected( $instance['roktabs_order'], 'date' ); ?>><?php _e('Date', 'roktabs'); ?></option>
      		<option value="title"<?php selected( $instance['roktabs_order'], 'title' ); ?>><?php _e('Title', 'roktabs'); ?></option>
      		<option value="modified"<?php selected( $instance['roktabs_order'], 'modified' ); ?>><?php _e('Modified', 'roktabs'); ?></option>
      		<option value="menu_order"<?php selected( $instance['roktabs_order'], 'menu_order' ); ?>><?php _e('Menu Order', 'roktabs'); ?></option>
      		<option value="parent"<?php selected( $instance['roktabs_order'], 'parent' ); ?>><?php _e('Parent', 'roktabs'); ?></option>
      		<option value="id"<?php selected( $instance['roktabs_order'], 'id' ); ?>>ID</option>
        </select><br /><br />
    	<label for="<?php echo $this->get_field_id('roktabs_tabs_count'); ?>"><?php _e('Number of Tabs:', 'roktabs'); ?></label>&nbsp;
    	<input style="width: 50px;" id="<?php echo $this->get_field_id('roktabs_tabs_count'); ?>" name="<?php echo $this->get_field_name('roktabs_tabs_count'); ?>" type="text" value="<?php echo $roktabs_tabs_count; ?>" />
    	<br /><br />
    	<label for="<?php echo $this->get_field_id('roktabs_pos'); ?>"><?php _e('Tabs Position:', 'roktabs'); ?></label>&nbsp;
    	<select id="<?php echo $this->get_field_id('roktabs_pos'); ?>" name="<?php echo $this->get_field_name('roktabs_pos'); ?>">
      		<option value="top"<?php selected( $instance['roktabs_pos'], 'top' ); ?>><?php _e('Top', 'roktabs'); ?></option>
      		<option value="bottom"<?php selected( $instance['roktabs_pos'], 'bottom' ); ?>><?php _e('Bottom', 'roktabs'); ?></option>
      		<option value="hidden"<?php selected( $instance['roktabs_pos'], 'hidden' ); ?>><?php _e('Hidden', 'roktabs'); ?></option>
        </select>
        <br /><br />
        <label for="<?php echo $this->get_field_id('roktabs_tabs_prefixed'); ?>1"><?php _e('Prefix tabs with numbers:', 'roktabs'); ?></label>
        <input id="<?php echo $this->get_field_id('roktabs_tabs_prefixed'); ?>1" type="radio" value="true" name="<?php echo $this->get_field_name('roktabs_tabs_prefixed'); ?>" <?php if($roktabs_tabs_prefixed=='true') echo 'checked="checked"'; ?>/>
		<label for="<?php echo $this->get_field_id('roktabs_tabs_prefixed'); ?>1"><?php _e('Yes', 'roktabs'); ?></label>&nbsp;&nbsp;
		<input id="<?php echo $this->get_field_id('roktabs_tabs_prefixed'); ?>0" type="radio" value="false" name="<?php echo $this->get_field_name('roktabs_tabs_prefixed'); ?>" <?php if($roktabs_tabs_prefixed=='false') echo 'checked="checked"'; ?>/>
		<label for="<?php echo $this->get_field_id('roktabs_tabs_prefixed'); ?>0"><?php _e('No', 'roktabs'); ?></label>
		<br /><br />
		<label for="<?php echo $this->get_field_id('roktabs_tabs_scrolling'); ?>1"><?php _e('Scrollable Tabs:', 'roktabs'); ?></label>
        <input id="<?php echo $this->get_field_id('roktabs_tabs_scrolling'); ?>1" type="radio" value="true" name="<?php echo $this->get_field_name('roktabs_tabs_scrolling'); ?>" <?php if($roktabs_tabs_scrolling=='true') echo 'checked="checked"'; ?>/>
		<label for="<?php echo $this->get_field_id('roktabs_tabs_scrolling'); ?>1"><?php _e('Yes', 'roktabs'); ?></label>&nbsp;&nbsp;
		<input id="<?php echo $this->get_field_id('roktabs_tabs_scrolling'); ?>0" type="radio" value="false" name="<?php echo $this->get_field_name('roktabs_tabs_scrolling'); ?>" <?php if($roktabs_tabs_scrolling=='false') echo 'checked="checked"'; ?>/>
		<label for="<?php echo $this->get_field_id('roktabs_tabs_scrolling'); ?>0"><?php _e('No', 'roktabs'); ?></label>
		<br /><br />
    	<label for="<?php echo $this->get_field_id('roktabs_width'); ?>"><?php _e('Width:', 'roktabs'); ?>&nbsp;
    	<input style="width: 50px;" id="<?php echo $this->get_field_id('roktabs_width'); ?>" name="<?php echo $this->get_field_name('roktabs_width'); ?>" type="text" value="<?php echo $roktabs_width; ?>" />px</label>
        <br /><br />
        <label for="<?php echo $this->get_field_id('roktabs_link_margin'); ?>1"><?php _e('Links Margin:', 'roktabs'); ?></label>
        <input id="<?php echo $this->get_field_id('roktabs_link_margin'); ?>1" type="radio" value="1" name="<?php echo $this->get_field_name('roktabs_link_margin'); ?>" <?php if($roktabs_link_margin=='1') echo 'checked="checked"'; ?>/>
		<label for="<?php echo $this->get_field_id('roktabs_link_margin'); ?>1"><?php _e('Yes', 'roktabs'); ?></label>&nbsp;&nbsp;
		<input id="<?php echo $this->get_field_id('roktabs_link_margin'); ?>0" type="radio" value="0" name="<?php echo $this->get_field_name('roktabs_link_margin'); ?>" <?php if($roktabs_link_margin=='0') echo 'checked="checked"'; ?>/>
		<label for="<?php echo $this->get_field_id('roktabs_link_margin'); ?>0"><?php _e('No', 'roktabs'); ?></label>
		<br /><br />
		<label for="<?php echo $this->get_field_id('roktabs_show_icon'); ?>1"><?php _e('Show Tab Icons:', 'roktabs'); ?></label>
        <input id="<?php echo $this->get_field_id('roktabs_show_icon'); ?>1" type="radio" value="1" name="<?php echo $this->get_field_name('roktabs_show_icon'); ?>" <?php if($roktabs_show_icon=='1') echo 'checked="checked"'; ?>/>
		<label for="<?php echo $this->get_field_id('roktabs_show_icon'); ?>1"><?php _e('Yes', 'roktabs'); ?></label>&nbsp;&nbsp;
		<input id="<?php echo $this->get_field_id('roktabs_show_icon'); ?>0" type="radio" value="0" name="<?php echo $this->get_field_name('roktabs_show_icon'); ?>" <?php if($roktabs_show_icon=='0') echo 'checked="checked"'; ?>/>
		<label for="<?php echo $this->get_field_id('roktabs_show_icon'); ?>0"><?php _e('No', 'roktabs'); ?></label>
		<br /><br />
		<label for="<?php echo $this->get_field_id('roktabs_icon_side'); ?>"><?php _e('Icon Position:', 'roktabs'); ?></label>&nbsp;
    	<select id="<?php echo $this->get_field_id('roktabs_icon_side'); ?>" name="<?php echo $this->get_field_name('roktabs_icon_side'); ?>">
      		<option value="left"<?php selected( $instance['roktabs_icon_side'], 'left' ); ?>><?php _e('Left', 'roktabs'); ?></option>
      		<option value="right"<?php selected( $instance['roktabs_icon_side'], 'right' ); ?>><?php _e('Right', 'roktabs'); ?></option>
        </select>
        <br /><br />
        <label for="<?php echo $this->get_field_id('roktabs_mouse'); ?>"><?php _e('Mouse Interaction:', 'roktabs'); ?></label>&nbsp;
    	<select id="<?php echo $this->get_field_id('roktabs_mouse'); ?>" name="<?php echo $this->get_field_name('roktabs_mouse'); ?>">
      		<option value="click"<?php selected( $instance['roktabs_mouse'], 'click' ); ?>><?php _e('Click', 'roktabs'); ?></option>
      		<option value="mouseenter"<?php selected( $instance['roktabs_mouse'], 'mouseenter' ); ?>><?php _e('MouseOver', 'roktabs'); ?></option>
        </select>
        <br /><br />
    	<label for="<?php echo $this->get_field_id('roktabs_duration'); ?>"><?php _e('Transition Duration:', 'roktabs'); ?>&nbsp;
    	<input style="width: 50px;" id="<?php echo $this->get_field_id('roktabs_duration'); ?>" name="<?php echo $this->get_field_name('roktabs_duration'); ?>" type="text" value="<?php echo $roktabs_duration; ?>" />ms</label>
    	<br /><br />
    	<label for="<?php echo $this->get_field_id('roktabs_transition_type'); ?>"><?php _e('Transition Type:', 'roktabs'); ?></label>&nbsp;
    	<select id="<?php echo $this->get_field_id('roktabs_transition_type'); ?>" name="<?php echo $this->get_field_name('roktabs_transition_type'); ?>">
      		<option value="scrolling"<?php selected( $instance['roktabs_transition_type'], 'scrolling' ); ?>><?php _e('Scrolling', 'roktabs'); ?></option>
      		<option value="fading"<?php selected( $instance['roktabs_transition_type'], 'fading' ); ?>><?php _e('Fading', 'roktabs'); ?></option>
        </select>
        <br /><br />
        <label for="<?php echo $this->get_field_id('roktabs_effect'); ?>"><?php _e('Transition Effect:', 'roktabs'); ?></label>&nbsp;
    	<select id="<?php echo $this->get_field_id('roktabs_effect'); ?>" name="<?php echo $this->get_field_name('roktabs_effect'); ?>">
      		<option value="linear"<?php selected( $instance['roktabs_effect'], 'linear' ); ?>>linear</option>
      		<option value="Quad.easeOut"<?php selected( $instance['roktabs_effect'], 'Quad.easeOut' ); ?>>Quad.easeOut</option>
      		<option value="Quad.easeIn"<?php selected( $instance['roktabs_effect'], 'Quad.easeIn' ); ?>>Quad.easeIn</option>
      		<option value="Quad.easeInOut"<?php selected( $instance['roktabs_effect'], 'Quad.easeInOut' ); ?>>Quad.easeInOut</option>
      		<option value="Cubic.easeOut"<?php selected( $instance['roktabs_effect'], 'Cubic.easeOut' ); ?>>Cubic.easeOut</option>
      		<option value="Cubic.easeIn"<?php selected( $instance['roktabs_effect'], 'Cubic.easeIn' ); ?>>Cubic.easeIn</option>
      		<option value="Cubic.easeInOut"<?php selected( $instance['roktabs_effect'], 'Cubic.easeInOut' ); ?>>Cubic.easeInOut</option>
      		<option value="Quart.easeOut"<?php selected( $instance['roktabs_effect'], 'Quart.easeOut' ); ?>>Quart.easeOut</option>
      		<option value="Quart.easeIn"<?php selected( $instance['roktabs_effect'], 'Quart.easeIn' ); ?>>Quart.easeIn</option>
      		<option value="Quart.easeInOut"<?php selected( $instance['roktabs_effect'], 'Quart.easeInOut' ); ?>>Quart.easeInOut</option>
      		<option value="Quint.easeOut"<?php selected( $instance['roktabs_effect'], 'Quint.easeOut' ); ?>>Quint.easeOut</option>
      		<option value="Quint.easeIn"<?php selected( $instance['roktabs_effect'], 'Quint.easeIn' ); ?>>Quint.easeIn</option>
      		<option value="Quint.easeInOut"<?php selected( $instance['roktabs_effect'], 'Quint.easeInOut' ); ?>>Quint.easeInOut</option>
      		<option value="Expo.easeOut"<?php selected( $instance['roktabs_effect'], 'Expo.easeOut' ); ?>>Expo.easeOut</option>
      		<option value="Expo.easeIn"<?php selected( $instance['roktabs_effect'], 'Expo.easeIn' ); ?>>Expo.easeIn</option>
      		<option value="Expo.easeInOut"<?php selected( $instance['roktabs_effect'], 'Expo.easeInOut' ); ?>>Expo.easeInOut</option>
      		<option value="Circ.easeOut"<?php selected( $instance['roktabs_effect'], 'Circ.easeOut' ); ?>>Circ.easeOut</option>
      		<option value="Circ.easeIn"<?php selected( $instance['roktabs_effect'], 'Circ.easeIn' ); ?>>Circ.easeIn</option>
      		<option value="Circ.easeInOut"<?php selected( $instance['roktabs_effect'], 'Circ.easeInOut' ); ?>>Circ.easeInOut</option>
      		<option value="Sine.easeOut"<?php selected( $instance['roktabs_effect'], 'Sine.easeOut' ); ?>>Sine.easeOut</option>
      		<option value="Sine.easeIn"<?php selected( $instance['roktabs_effect'], 'Sine.easeIn' ); ?>>Sine.easeIn</option>
      		<option value="Sine.easeInOut"<?php selected( $instance['roktabs_effect'], 'Sine.easeInOut' ); ?>>Sine.easeInOut</option>
      		<option value="Back.easeOut"<?php selected( $instance['roktabs_effect'], 'Back.easeOut' ); ?>>Back.easeOut</option>
      		<option value="Back.easeIn"<?php selected( $instance['roktabs_effect'], 'Back.easeIn' ); ?>>Back.easeIn</option>
      		<option value="Back.easeInOut"<?php selected( $instance['roktabs_effect'], 'Back.easeInOut' ); ?>>Back.easeInOut</option>
      		<option value="Bounce.easeOut"<?php selected( $instance['roktabs_effect'], 'Bounce.easeOut' ); ?>>Bounce.easeOut</option>
      		<option value="Bounce.easeIn"<?php selected( $instance['roktabs_effect'], 'Bounce.easeIn' ); ?>>Bounce.easeIn</option>
      		<option value="Bounce.easeInOut"<?php selected( $instance['roktabs_effect'], 'Bounce.easeInOut' ); ?>>Bounce.easeInOut</option>
      		<option value="Elastic.easeOut"<?php selected( $instance['roktabs_effect'], 'Elastic.easeOut' ); ?>>Elastic.easeOut</option>
      		<option value="Elastic.easeIn"<?php selected( $instance['roktabs_effect'], 'Elastic.easeIn' ); ?>>Elastic.easeIn</option>
      		<option value="Elastic.easeInOut"<?php selected( $instance['roktabs_effect'], 'Elastic.easeInOut' ); ?>>Elastic.easeInOut</option>
        </select>
        <br /><br />
        <label for="<?php echo $this->get_field_id('roktabs_autoplay'); ?>1"><?php _e('Enable Autoplay:', 'roktabs'); ?></label>
        <input id="<?php echo $this->get_field_id('roktabs_autoplay'); ?>1" type="radio" value="1" name="<?php echo $this->get_field_name('roktabs_autoplay'); ?>" <?php if($roktabs_autoplay=='1') echo 'checked="checked"'; ?>/>
		<label for="<?php echo $this->get_field_id('roktabs_autoplay'); ?>1"><?php _e('Yes', 'roktabs'); ?></label>&nbsp;&nbsp;
		<input id="<?php echo $this->get_field_id('roktabs_autoplay'); ?>0" type="radio" value="0" name="<?php echo $this->get_field_name('roktabs_autoplay'); ?>" <?php if($roktabs_autoplay=='0') echo 'checked="checked"'; ?>/>
		<label for="<?php echo $this->get_field_id('roktabs_autoplay'); ?>0"><?php _e('No', 'roktabs'); ?></label>
		<br /><br />
		<label for="<?php echo $this->get_field_id('roktabs_autoplay_delay'); ?>"><?php _e('Autoplay Delay:', 'roktabs'); ?>&nbsp;
    	<input style="width: 60px;" id="<?php echo $this->get_field_id('roktabs_autoplay_delay'); ?>" name="<?php echo $this->get_field_name('roktabs_autoplay_delay'); ?>" type="text" value="<?php echo $roktabs_autoplay_delay; ?>" />ms</label>
    	<br /><br />
        <?php
    	
	}

}

function RokTabsInit() {
  global $platform;
  if($platform != 'iphone') :
	  register_widget('RokTabsWidget');
  endif;
	if(!is_admin() && $platform != 'iphone') {
		add_action('wp_head', 'roktabs_script', 7);
	}
}

add_action('widgets_init', 'RokTabsInit');

// Load Language

load_plugin_textdomain('roktabs', false, basename($roktabs_plugin_path).'/languages/');

// MooTools Enqueue Script

add_action('init','roktabs_mootools_init',-50);
function roktabs_mootools_init(){
	global $roktabs_plugin_path, $roktabs_plugin_url;
    wp_register_script('mootools.js', $roktabs_plugin_url.'/js/mootools.js');
	wp_enqueue_script('mootools.js');
}

// RokTabs defaults

function roktabs_options() {
	
	$roktabs_options = array(
	
		'theme' => 'light',
		'icons_path' => '__plugin__/icons'
		
	);
	
	add_option('roktabs_options', $roktabs_options);
}

add_action('init','roktabs_options');

// RokTabs register icons script

function roktabs_icons_script() {
	global $roktabs_plugin_path, $roktabs_plugin_url;
	wp_register_script('icons.js', $roktabs_plugin_url.'/admin/icons.js');
	wp_enqueue_script('icons.js');
}

if(is_admin() && (isset($_GET['post']) && isset($_GET['action']) && $_GET['action'] == 'edit')) {
	add_action('admin_init', 'roktabs_icons_script');
}

// RokTabs load icons style

function roktabs_icons_style() {
	global $roktabs_plugin_path, $roktabs_plugin_url;
	wp_enqueue_style('icons.css', $roktabs_plugin_url.'/admin/icons.css');
}

if(is_admin() && ((isset($_GET['post']) && isset($_GET['action']) && $_GET['action'] == 'edit') || (isset($_GET['page']) && $_GET['page'] == 'roktabs-settings'))) {
	add_action('admin_init', 'roktabs_icons_style');
}
	
// RokTabs Admin Stuff Settings

function roktabs_admin_stuff() {
	register_setting('roktabs_options_array', 'roktabs_options');
}

if(is_admin()) {
	add_action('admin_init', 'roktabs_admin_stuff');
}

// Add scripts



	function roktabs_script() {
	
		global $roktabs_plugin_path, $roktabs_plugin_url;
	
		$option = get_option('roktabs_options');
		$theme = $option['theme'];
		
		wp_register_script('roktabs.js', $roktabs_plugin_url.'/js/roktabs.js');
		wp_enqueue_script('roktabs.js');
		
		wp_register_style('roktabs.css', $roktabs_plugin_url.'/tmpl/'.$theme.'/roktabs.css');
	
		if($theme != 'custom') :
			wp_enqueue_style('roktabs.css');
		endif;

	}


// Load Icons

function loadIcons() {

	global $post, $roktabs_plugin_path, $roktabs_plugin_url;
	
	$value = get_post_meta($post->ID, '_roktabs_icon', true);

	$option = get_option('roktabs_options');
	$activated_theme = get_option('template');
	
	$plugin_remote = $roktabs_plugin_url;
	$plugin_local = $roktabs_plugin_path;
	$theme_remote = get_bloginfo('template_directory');
	$theme_local = ABSPATH.'wp-content/themes/'.$activated_theme;
	$wpcontent_remote = get_bloginfo('wpurl').'/wp-content';
	$wpcontent_local = ABSPATH.'wp-content';

	$icon_url_remote = $roktabs_plugin_url.'/icons/';
	$icon_url_local = $roktabs_plugin_path.'/icons/';
	
	if($option['icons_path'] != '') {
		$icon_url_remote = $option['icons_path'];
		$icon_url_local = $option['icons_path'];
	}
	
	$icon_url_remote = str_replace('__plugin__', $plugin_remote, $icon_url_remote);
	$icon_url_local = str_replace('__plugin__', $plugin_local, $icon_url_local);
	$icon_url_remote = str_replace('__theme__', $theme_remote, $icon_url_remote);
	$icon_url_local = str_replace('__theme__', $theme_local, $icon_url_local);
	$icon_url_remote = str_replace('__wp-content__', $wpcontent_remote, $icon_url_remote);
	$icon_url_local = str_replace('__wp-content__', $wpcontent_local, $icon_url_local);
	
	if(substr($icon_url_remote, -1) != '/') : $icon_url_remote = $icon_url_remote.'/'; endif;
  	if(substr($icon_url_local, -1) != '/') : $icon_url_local = $icon_url_local.'/'; endif;
	
	$icons = array('__none__');
	$html = "";
	
	if ($handle = @opendir($icon_url_local)) {
	    while (false !== ($file = readdir($handle))) {
	        if ($file != "." && $file != "..") {
	            $ext = strtolower(substr($file, strrpos($file, '.') + 1));
				if ($ext == 'gif' || $ext == 'bmp' || $ext == 'jpg' || $ext == 'png') {
					array_push($icons, $file);
				}
	        }
	    }
	    closedir($handle);
	}
	
	foreach($icons as $icon) {
		if ($icon == $value) $selected = "selected='selected'";
		else $selected = "";
		$html .= "<option value='".$icon."' alt='".$icon_url_remote.$icon."' $selected>".$icon."</option>";
	}
	
	return $html;

}

// Add RokTabs meta box

function roktabs_add_custom_box() {
     add_meta_box('roktabs_box', 'RokTabs '.__('Icon', 'roktabs'), 'roktabs_custom_box', 'post', 'side');
}

function roktabs_custom_box() {
	global $post, $roktabs_plugin_path, $roktabs_plugin_url;
	
	$icon = get_post_meta($post->ID,'_roktabs_icon',true);	
	
	$option = get_option('roktabs_options');
	$activated_theme = get_option('template');
	
	$plugin_remote = $roktabs_plugin_url;
	$plugin_local = $roktabs_plugin_path;
	$theme_remote = get_bloginfo('template_directory');
	$wpcontent_remote = get_bloginfo('wpurl').'/wp-content';

	$icon_url_remote = $roktabs_plugin_url.'/icons/';
	
	if($option['icons_path'] != '') {
		$icon_url_remote = $option['icons_path'];
	}
	
	$icon_url_remote = str_replace('__plugin__', $plugin_remote, $icon_url_remote);
	$icon_url_remote = str_replace('__theme__', $theme_remote, $icon_url_remote);
	$icon_url_remote = str_replace('__wp-content__', $wpcontent_remote, $icon_url_remote);
	
	if(substr($icon_url_remote, -1) != '/') : $icon_url_remote = $icon_url_remote.'/'; endif;
	
	$html = '';
	
	echo '<input type="hidden" name="roktabs_noncename" id="roktabs_noncename" value="'.wp_create_nonce('rt_roktabs').'" />';
	echo '<input type="hidden" id="paramstabs_iconpath" value="'.$icon_url_remote.'" />';
	
	$html .= "<div class='icons'>";
	$html .= "	<span class='tab_label'>".__('Please Choose Icon :', 'roktabs')."</span><br /><br />";
	$html .= " <div class='icons_previews'></div>";
	$html .= "	<select class='inputbox' name='rt_roktabs_box' id='rt_roktabs_box'>";
	$html .= 		loadIcons();
	$html .= "	</select>";
	$html .= "	<div style='clear: both;'></div>";
	$html .= "</div>";
	
	echo $html;

}

function roktabs_save_data($post_id) {
     // verify this with nonce because save_post can be triggered at other times
     if (!wp_verify_nonce($_POST['roktabs_noncename'], 'rt_roktabs')) return $post_id;
     
     // do not save if this is an auto save routine
     if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;

     $rt_icon_box = trim($_POST['rt_roktabs_box']);
     if($rt_icon_box != '') :
    	 update_post_meta($post_id, '_roktabs_icon', $rt_icon_box);
	 else:
	 	 delete_post_meta($post_id, '_roktabs_icon');
	 endif;
}

add_action('save_post', 'roktabs_save_data');
add_action('admin_menu', 'roktabs_add_custom_box');

// Add Settings

function roktabs_settings_add($links) {
	$settings_link = '<a href="plugins.php?page=roktabs-settings">'.__('Settings').'</a>';
	array_unshift($links, $settings_link);
	return $links;
}

function roktabs_settings_action() {
	$plugin = plugin_basename(__FILE__);
	add_filter('plugin_action_links_'.$plugin, 'roktabs_settings_add');
}

add_action('admin_menu', 'roktabs_settings_action');

// Plugin settings page

function roktabs_menu() {
	add_plugins_page('RokTabs', 'RokTabs', 'activate_plugins', 'roktabs-settings', 'roktabs_settings_showup');  
}

add_action('admin_menu', 'roktabs_menu', 9);

function roktabs_admin_css() {

	global $roktabs_plugin_path, $roktabs_plugin_url; ?>
	
	<style type="text/css">
	#icon-roktabs {
		background: url(<?php echo $roktabs_plugin_url.'/roktabs_big.png'; ?>) no-repeat 0 0;
	}
	.roktabs-table table tr {height: 35px;}
	.roktabs-table table td {vertical-align: middle;}
	</style>

<?php }

if(is_admin() && (isset($_GET['page']) && $_GET['page'] == 'roktabs-settings')) {
	add_action('admin_head', 'roktabs_admin_css');
}

// RokBox settings page

function roktabs_settings_showup() {

	global $roktabs_plugin_path, $roktabs_plugin_url;
	
	$option = get_option('roktabs_options');
	$activated_theme = get_option('template');
	
	$plugin_remote = $roktabs_plugin_url;
	$theme_remote = get_bloginfo('template_directory');
	$wpcontent_remote = get_bloginfo('wpurl').'/wp-content';
	
	$icon_url_remote = $roktabs_plugin_url.'/icons/';
		
	if($option['icons_path'] != '') {
		$icon_url_remote = $option['icons_path'];
	}
	
	$icon_url_remote = str_replace('__plugin__', $plugin_remote, $icon_url_remote);
	$icon_url_remote = str_replace('__theme__', $theme_remote, $icon_url_remote);
	$icon_url_remote = str_replace('__wp-content__', $wpcontent_remote, $icon_url_remote);
	
	if(isset($_GET['updated']) && $_GET['updated'] == 'true') { ?><div id="message" class="updated fade"><p><?php _e('RokTabs settings saved.', 'roktabs'); ?></p></div><?php } ?>
	
	<div class="wrap">
		<div class="icon32" id="icon-roktabs"><br /></div>
		<h2>RokTabs</h2><br />
		
		<div style="margin: 0 auto; width: 50%;" class="roktabs-table">
		
			<form method="post" action="options.php">
				<?php settings_fields('roktabs_options_array'); ?>
				
				<table cellspacing="0" class="widefat fixed">
					<thead>
						<tr>
							<th></th>
							<th>
								<input type="submit" class="button" value="<?php _e('Save Changes', 'roktabs'); ?>" style="padding: 3px; float: right;" />
							</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th></th>
							<th>
								<input type="submit" class="button" value="<?php _e('Save Changes', 'roktabs'); ?>" style="padding: 3px; float: right;" />
							</th>
						</tr>
					</tfoot>
					<tbody>
						<tr valign="middle" class="alternate iedit">
							<td>
								<b><?php _e('Preset Themes', 'roktabs'); ?></b></td>
							<td>
								<select id="theme" name="roktabs_options[theme]">
				      			    <option value="light" <?php if ($option['theme'] == "light") : ?>selected="selected"<?php endif; ?>><?php _e('Light', 'roktabs'); ?></option>
				      			    <option value="dark" <?php if ($option['theme'] == "dark") : ?>selected="selected"<?php endif; ?>><?php _e('Dark', 'roktabs'); ?></option>
				      			    <option value="custom" <?php if ($option['theme'] == "custom") : ?>selected="selected"<?php endif; ?>><?php _e('Custom', 'roktabs'); ?></option>
				                </select>
							</td>
						</tr>
						<tr valign="middle" class="iedit">
							<td>
								<b><?php _e('Icons Path', 'roktabs'); ?></b>
							</td>
							<td>
								<input id="icons_path" type="text" size="40" maxlength="255" name="roktabs_options[icons_path]" value="<?php echo $option['icons_path']; ?>" />
							</td>
						</tr>
						<tr valign="middle" class="alternate iedit">
							<td>
								<b><?php _e('Path Preview', 'roktabs'); ?></b>
							</td>
							<td>
								<?php echo strip_tags($icon_url_remote); ?>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		
		</div>
		
	</div><br />
	
	<div class="roktabs-notice">
		<h3 style="margin: 0pt 0pt 10px;"><b><?php _e('Please Use :', 'roktabs'); ?></b></h3>
		<div class="path_tokens">
			__plugin__
		</div>
		<div class="path_descriptions">
			&rsaquo; <?php _e('for the path to the RokTabs plugin ie.', 'roktabs'); ?> http://your-site.com/wp-content/plugins/wp_roktabs  
		</div>
		<div class="path_tokens">
	        __theme__
		</div>
		<div class="path_descriptions">
			&rsaquo; <?php _e('for the path to your currently active theme ie.', 'roktabs'); ?> http://your-site.com/wp-content/themes/your-theme
	    </div>
		<div class="path_tokens">
			__wp-content__
		</div>
	    <div class="path_descriptions">
	    	&rsaquo; <?php _e('for the path to the wp-content directory ie.', 'roktabs'); ?> http://your-site.com/wp-content
	    </div>
		<div style="clear:both;"></div>
	</div>

<?php
 
}

?>