<?php

/**
 * @version   1.12 August 16, 2011
 * @author    RocketTheme, LLC http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2011 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
/*
Plugin Name: RokNewsPager
Plugin URI: http://www.rockettheme.com
Description: RokNewsPager is an post previewer and rotator. It displays posts, in a summarised form and, using mootools based javascript transition, rotates through a series of pages displaying articles in a contracted list format.
Author: RocketTheme, LLC
Version: 1.12
Author URI: http://www.rockettheme.com
License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
*/

// Globals

global $roknewspager_plugin_path, $roknewspager_plugin_url, $platform;
$roknewspager_plugin_path = dirname($plugin);
$roknewspager_plugin_url = WP_PLUGIN_URL.'/'.basename($roknewspager_plugin_path);

require(dirname(__FILE__).'/rokbrowser_check.php');

$browser_check = new RokBrowserCheck;
$platform = $browser_check->platform;

// Widget

class RokNewsPager extends WP_Widget {

	// RocketTheme RokNewsPager Widget
	// Port by Jakub Baran

    static $plugin_path;
    static $plugin_url;
    var $short_name = 'roknewspager';
    var $long_name = 'RokNewsPager';
    var $description = 'RocketTheme RokNewsPager Widget';
    var $css_classname = 'widget_roknewspager';
    var $width = 300;
    var $height = 400;
    var $_defaults = array(
        'title' => '',
        'category' => 'uncategorized',
        'order' => 'date',
        'posts_per_page' => '5',
        'show_text' => 1,
        'content' => 'content',
        'post_title' => 1,
        'comments' => 1,
        'author' => 0,
        'date' => 0,
        'thumbs' => 1,
        'thumb_width' => '170',
        'thumb_height' => '136',
        'thumb_link' => 1,
        'more' => 1,
        'more_label' => 'Read More ...',
        'accordion' => 0,
        'paging' => 1,
        'max_pages' => '8',
        'auto_update' => 0,
        'update_delay' => '5000',
        'offset' => 0,
        'allowed_tags' => 'a,br,strong,em,img,b',
        'thumb_generator' => 'default'
    );

    function init() {
    	global $platform;
    	if($platform != 'iphone') :
	        register_widget("RokNewsPager");
    	endif;
        if(!is_admin() && $platform != 'iphone') {
            add_action('wp_head', 'roknewspager_script', 7);
        }

    }

    function render($args, $instance) {
        global $gantry, $more, $post, $roknewspager_plugin_path, $roknewspager_plugin_url;
        
        $option = get_option('roknewspager_options');
        
        $get_id = 'widget-'.$args['widget_id'];
        $catid = get_category_by_slug($instance['category']);
        $count = count(get_posts('numberposts=-1&cat='.$catid->term_id));
        $pages = ceil($count/$instance['posts_per_page']);
		$curpage = intval(($instance['offset']/$instance['posts_per_page'])+1);
        
        ob_start();
        echo $args['before_widget'];
        if($instance['title'] != '')
 		echo $args['before_title'] . $instance['title'] . $args['after_title']; 		
 		
        ?>
        
        <?php if (get_posts('cat='.$catid->term_id)) {
			
	  			if($instance['accordion']) : require($roknewspager_plugin_path.'/tmpl/accordion.php'); 
				else : require($roknewspager_plugin_path.'/tmpl/default.php');
				endif;
			
	 		wp_reset_query();
			
			} else {
			
			_e('Sorry, but your category is empty!', 'roknewspager');
			
			} ?>
        
	        <div class="clear"></div>
        
        <?php
        
        echo $args['after_widget'];
        echo ob_get_clean();
    }
    
    function form($instance) {
    	global $roknewspager_plugin_path, $roknewspager_plugin_url;
        $defaults = $this->_defaults;
  		$instance = wp_parse_args((array) $instance, $defaults);
        foreach ($instance as $variable => $value)
        {
            $$variable = self::_cleanOutputVariable($variable, $value);
            $instance[$variable] = $$variable;
        }
        $this->_values = $instance;
        
        $categories = get_terms('category', 'hide_empty=0&orderby=name');
        
        ob_start();
        ?>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'roknewspager'); ?>:&nbsp;
    	<input style="width: 265px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" /></label>
		<br /><br />
		<label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('Posts Category:', 'roknewspager'); ?></label>&nbsp;
		<select name="<?php echo $this->get_field_name('category'); ?>" id="<?php echo $this->get_field_id('category'); ?>">
			<?php foreach ($categories as $cat) { ?>
				<option value="<?php echo $cat->slug; ?>"<?php if($instance['category'] == $cat->slug) : echo ' selected="selected"'; endif; ?>><?php echo $cat->name; ?></option>
			<?php } ?>
		</select>
		<br /><br />
		<label for="<?php echo $this->get_field_id('order'); ?>"><?php _e('Order:', 'roknewspager'); ?></label>&nbsp;
    	<select id="<?php echo $this->get_field_id('order'); ?>" name="<?php echo $this->get_field_name('order'); ?>">
      		<option value="author"<?php selected( $instance['order'], 'author' ); ?>><?php _e('Author', 'roknewspager'); ?></option>
      		<option value="date"<?php selected( $instance['order'], 'date' ); ?>><?php _e('Date', 'roknewspager'); ?></option>
      		<option value="title"<?php selected( $instance['order'], 'title' ); ?>><?php _e('Title', 'roknewspager'); ?></option>
      		<option value="modified"<?php selected( $instance['order'], 'modified' ); ?>><?php _e('Modified', 'roknewspager'); ?></option>
      		<option value="menu_order"<?php selected( $instance['order'], 'menu_order' ); ?>><?php _e('Menu Order', 'roknewspager'); ?></option>
      		<option value="parent"<?php selected( $instance['order'], 'parent' ); ?>><?php _e('Parent', 'roknewspager'); ?></option>
      		<option value="id"<?php selected( $instance['order'], 'id' ); ?>>ID</option>
        </select>
        <br /><br />
        <label for="<?php echo $this->get_field_id('posts_per_page'); ?>"><?php _e('Number of Posts Per Page:', 'roknewspager'); ?>&nbsp;
    	<input style="width: 40px;" id="<?php echo $this->get_field_id('posts_per_page'); ?>" name="<?php echo $this->get_field_name('posts_per_page'); ?>" type="text" value="<?php echo $instance['posts_per_page']; ?>" /></label>
    	<br /><br />
    	<?php _e('Show Content:', 'roknewspager'); ?>
    	<input id="<?php echo $this->get_field_id('show_text'); ?>1" type="radio" value="1" name="<?php echo $this->get_field_name('show_text'); ?>" <?php if($instance['show_text'] == 1) echo 'checked="checked"'; ?>/>
		<label for="<?php echo $this->get_field_id('show_text'); ?>1"><?php _e('Yes', 'roknewspager'); ?></label>&nbsp;&nbsp;
		<input id="<?php echo $this->get_field_id('show_text'); ?>0" type="radio" value="0" name="<?php echo $this->get_field_name('show_text'); ?>" <?php if($instance['show_text'] == 0) echo 'checked="checked"'; ?>/>
		<label for="<?php echo $this->get_field_id('show_text'); ?>0"><?php _e('No', 'roknewspager'); ?></label>
		<br /><br />
		<label for="<?php echo $this->get_field_id('content'); ?>"><?php _e('Type of Content:', 'roknewspager'); ?></label>&nbsp;
    	<select id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name('content'); ?>">
      		<option value="content"<?php selected($instance['content'], 'content'); ?>><?php _e('Content', 'roknewspager'); ?></option>
      		<option value="excerpt"<?php selected($instance['content'], 'excerpt'); ?>><?php _e('Excerpt', 'roknewspager'); ?></option>
        </select>
        <br /><br />
        <?php _e('Display Post Title:', 'roknewspager'); ?>
    	<input id="<?php echo $this->get_field_id('post_title'); ?>1" type="radio" value="1" name="<?php echo $this->get_field_name('post_title'); ?>" <?php if($instance['post_title'] == 1) echo 'checked="checked"'; ?>/>
		<label for="<?php echo $this->get_field_id('post_title'); ?>1"><?php _e('Yes', 'roknewspager'); ?></label>&nbsp;&nbsp;
		<input id="<?php echo $this->get_field_id('post_title'); ?>0" type="radio" value="0" name="<?php echo $this->get_field_name('post_title'); ?>" <?php if($instance['post_title'] == 0) echo 'checked="checked"'; ?>/>
		<label for="<?php echo $this->get_field_id('post_title'); ?>0"><?php _e('No', 'roknewspager'); ?></label>
		<br /><br />
		<?php _e('Display Date:', 'roknewspager'); ?>
    	<input id="<?php echo $this->get_field_id('date'); ?>1" type="radio" value="1" name="<?php echo $this->get_field_name('date'); ?>" <?php if($instance['date'] == 1) echo 'checked="checked"'; ?>/>
		<label for="<?php echo $this->get_field_id('date'); ?>1"><?php _e('Yes', 'roknewspager'); ?></label>&nbsp;&nbsp;
		<input id="<?php echo $this->get_field_id('date'); ?>0" type="radio" value="0" name="<?php echo $this->get_field_name('date'); ?>" <?php if($instance['date'] == 0) echo 'checked="checked"'; ?>/>
		<label for="<?php echo $this->get_field_id('date'); ?>0"><?php _e('No', 'roknewspager'); ?></label>
		<br /><br />
		<?php _e('Display Author:', 'roknewspager'); ?>
    	<input id="<?php echo $this->get_field_id('author'); ?>1" type="radio" value="1" name="<?php echo $this->get_field_name('author'); ?>" <?php if($instance['author'] == 1) echo 'checked="checked"'; ?>/>
		<label for="<?php echo $this->get_field_id('author'); ?>1"><?php _e('Yes', 'roknewspager'); ?></label>&nbsp;&nbsp;
		<input id="<?php echo $this->get_field_id('author'); ?>0" type="radio" value="0" name="<?php echo $this->get_field_name('author'); ?>" <?php if($instance['author'] == 0) echo 'checked="checked"'; ?>/>
		<label for="<?php echo $this->get_field_id('author'); ?>0"><?php _e('No', 'roknewspager'); ?></label>
		<br /><br />
		<?php _e('Display Comments:', 'roknewspager'); ?>
    	<input id="<?php echo $this->get_field_id('comments'); ?>1" type="radio" value="1" name="<?php echo $this->get_field_name('comments'); ?>" <?php if($instance['comments'] == 1) echo 'checked="checked"'; ?>/>
		<label for="<?php echo $this->get_field_id('comments'); ?>1"><?php _e('Yes', 'roknewspager'); ?></label>&nbsp;&nbsp;
		<input id="<?php echo $this->get_field_id('comments'); ?>0" type="radio" value="0" name="<?php echo $this->get_field_name('comments'); ?>" <?php if($instance['comments'] == 0) echo 'checked="checked"'; ?>/>
		<label for="<?php echo $this->get_field_id('comments'); ?>0"><?php _e('No', 'roknewspager'); ?></label>
		<br /><br />
		<?php _e('Display Thumbnails:', 'roknewspager'); ?>
    	<input id="<?php echo $this->get_field_id('thumbs'); ?>1" type="radio" value="1" name="<?php echo $this->get_field_name('thumbs'); ?>" <?php if($instance['thumbs'] == 1) echo 'checked="checked"'; ?>/>
		<label for="<?php echo $this->get_field_id('thumbs'); ?>1"><?php _e('Yes', 'roknewspager'); ?></label>&nbsp;&nbsp;
		<input id="<?php echo $this->get_field_id('thumbs'); ?>0" type="radio" value="0" name="<?php echo $this->get_field_name('thumbs'); ?>" <?php if($instance['thumbs'] == 0) echo 'checked="checked"'; ?>/>
		<label for="<?php echo $this->get_field_id('thumbs'); ?>0"><?php _e('No', 'roknewspager'); ?></label>
		<br /><br />
		<label for="<?php echo $this->get_field_id('thumb_width'); ?>"><?php _e('Thumbnail Dimensions:', 'roknewspager'); ?>&nbsp;
    	<input style="width: 40px;" id="<?php echo $this->get_field_id('thumb_width'); ?>" name="<?php echo $this->get_field_name('thumb_width'); ?>" type="text" value="<?php echo $instance['thumb_width']; ?>" />&nbsp;px</label>
    	&nbsp;&nbsp;x&nbsp;&nbsp;
    	<input style="width: 40px;" id="<?php echo $this->get_field_id('thumb_height'); ?>" name="<?php echo $this->get_field_name('thumb_height'); ?>" type="text" value="<?php echo $instance['thumb_height']; ?>" />&nbsp;px
    	<br /><br />
    	<?php _e('Link Thumbnails:', 'roknewspager'); ?>
    	<input id="<?php echo $this->get_field_id('thumb_link'); ?>1" type="radio" value="1" name="<?php echo $this->get_field_name('thumb_link'); ?>" <?php if($instance['thumb_link'] == 1) echo 'checked="checked"'; ?>/>
		<label for="<?php echo $this->get_field_id('thumb_link'); ?>1"><?php _e('Yes', 'roknewspager'); ?></label>&nbsp;&nbsp;
		<input id="<?php echo $this->get_field_id('thumb_link'); ?>0" type="radio" value="0" name="<?php echo $this->get_field_name('thumb_link'); ?>" <?php if($instance['thumb_link'] == 0) echo 'checked="checked"'; ?>/>
		<label for="<?php echo $this->get_field_id('thumb_link'); ?>0"><?php _e('No', 'roknewspager'); ?></label>
		<br /><br />
		<?php _e('Show "More" Button:', 'roknewspager'); ?>
    	<input id="<?php echo $this->get_field_id('more'); ?>1" type="radio" value="1" name="<?php echo $this->get_field_name('more'); ?>" <?php if($instance['more'] == 1) echo 'checked="checked"'; ?>/>
		<label for="<?php echo $this->get_field_id('more'); ?>1"><?php _e('Yes', 'roknewspager'); ?></label>&nbsp;&nbsp;
		<input id="<?php echo $this->get_field_id('more'); ?>0" type="radio" value="0" name="<?php echo $this->get_field_name('more'); ?>" <?php if($instance['more'] == 0) echo 'checked="checked"'; ?>/>
		<label for="<?php echo $this->get_field_id('more'); ?>0"><?php _e('No', 'roknewspager'); ?></label>
		<br /><br />
		<label for="<?php echo $this->get_field_id('more_label'); ?>"><?php _e('"More" Button Label:', 'roknewspager'); ?>&nbsp;
    	<input style="width: 190px;" id="<?php echo $this->get_field_id('more_label'); ?>" name="<?php echo $this->get_field_name('more_label'); ?>" type="text" value="<?php echo $instance['more_label']; ?>" /></label>
		<br /><br />
		<?php _e('Pagination:', 'roknewspager'); ?>
    	<input id="<?php echo $this->get_field_id('paging'); ?>1" type="radio" value="1" name="<?php echo $this->get_field_name('paging'); ?>" <?php if($instance['paging'] == 1) echo 'checked="checked"'; ?>/>
		<label for="<?php echo $this->get_field_id('paging'); ?>1"><?php _e('Yes', 'roknewspager'); ?></label>&nbsp;&nbsp;
		<input id="<?php echo $this->get_field_id('paging'); ?>0" type="radio" value="0" name="<?php echo $this->get_field_name('paging'); ?>" <?php if($instance['paging'] == 0) echo 'checked="checked"'; ?>/>
		<label for="<?php echo $this->get_field_id('paging'); ?>0"><?php _e('No', 'roknewspager'); ?></label>
		<br /><br />
		<label for="<?php echo $this->get_field_id('max_pages'); ?>"><?php _e('Max Number of Pages:', 'roknewspager'); ?>&nbsp;
    	<input style="width: 50px;" id="<?php echo $this->get_field_id('max_pages'); ?>" name="<?php echo $this->get_field_name('max_pages'); ?>" type="text" value="<?php echo $instance['max_pages']; ?>" /></label>
		<br /><br />
		<?php _e('Accordion:', 'roknewspager'); ?>
    	<input id="<?php echo $this->get_field_id('accordion'); ?>1" type="radio" value="1" name="<?php echo $this->get_field_name('accordion'); ?>" <?php if($instance['accordion'] == 1) echo 'checked="checked"'; ?>/>
		<label for="<?php echo $this->get_field_id('accordion'); ?>1"><?php _e('Yes', 'roknewspager'); ?></label>&nbsp;&nbsp;
		<input id="<?php echo $this->get_field_id('accordion'); ?>0" type="radio" value="0" name="<?php echo $this->get_field_name('accordion'); ?>" <?php if($instance['accordion'] == 0) echo 'checked="checked"'; ?>/>
		<label for="<?php echo $this->get_field_id('accordion'); ?>0"><?php _e('No', 'roknewspager'); ?></label>
		<br /><br />
		<label for="<?php echo $this->get_field_id('allowed_tags'); ?>"><?php _e('Allowed HTML tags:', 'roknewspager'); ?>&nbsp;
    	<input style="width: 185px;" id="<?php echo $this->get_field_id('allowed_tags'); ?>" name="<?php echo $this->get_field_name('allowed_tags'); ?>" type="text" value="<?php echo $instance['allowed_tags']; ?>" /></label>
		<br /><br />
		<?php _e('Auto Update:', 'roknewspager'); ?>
    	<input id="<?php echo $this->get_field_id('auto_update'); ?>1" type="radio" value="1" name="<?php echo $this->get_field_name('auto_update'); ?>" <?php if($instance['auto_update'] == 1) echo 'checked="checked"'; ?>/>
		<label for="<?php echo $this->get_field_id('auto_update'); ?>1"><?php _e('Yes', 'roknewspager'); ?></label>&nbsp;&nbsp;
		<input id="<?php echo $this->get_field_id('auto_update'); ?>0" type="radio" value="0" name="<?php echo $this->get_field_name('auto_update'); ?>" <?php if($instance['auto_update'] == 0) echo 'checked="checked"'; ?>/>
		<label for="<?php echo $this->get_field_id('auto_update'); ?>0"><?php _e('No', 'roknewspager'); ?></label>
		<br /><br />
		<label for="<?php echo $this->get_field_id('update_delay'); ?>"><?php _e('Update Delay:', 'roknewspager'); ?>&nbsp;
    	<input style="width: 100px;" id="<?php echo $this->get_field_id('update_delay'); ?>" name="<?php echo $this->get_field_name('update_delay'); ?>" type="text" value="<?php echo $instance['update_delay']; ?>" /></label>
		<br /><br />
		<input type="hidden" id="<?php echo $this->get_field_id('offset'); ?>" name="<?php echo $this->get_field_name('offset'); ?>" type="text" value="<?php echo $instance['offset']; ?>" />
		<hr style="border: none; border-bottom: 1px dashed #919191;" />
        <h3><?php _e('Debug Information', 'roknewspager'); ?></h3>
        <?php
        
        _e('GD2 Library Present: ', 'roknewspager');
        
        if (extension_loaded('gd') && function_exists('gd_info')) {
    		echo '<span style="color: #177F08; font-weight: bold;">'.__('YES', 'roknewspager').'</span>';
		} else {
			echo '<span style="color: #C30C0C; font-weight: bold;">'.__('NO', 'roknewspager').'</span>';
		}
        
        echo '<br />';
        _e('Cache Directory Writeable: ', 'roknewspager');
        
		if (is_writeable($roknewspager_plugin_path . '/cache')) {
    		echo '<span style="color: #177F08; font-weight: bold;">'.__('YES', 'roknewspager').'</span><br /><br />';
		} else {
			echo '<span style="color: #C30C0C; font-weight: bold;">'.__('NO', 'roknewspager').'</span><br /><br />';
		}
		
        echo ob_get_clean();
    }
    
     /********** Bellow here should not need to be changed***********/

    function __construct() {
        if (empty($this->short_name) || empty($this->long_name)) {
            die("A widget must have a valid type and classname defined");
        }
        $widget_options = array('classname' => $this->css_classname, 'description' => __($this->description));
        $control_options = array('width' => $this->width, 'height' => $this->height);
        parent::__construct($this->short_name, $this->long_name, $widget_options, $control_options);
    }

    function _cleanOutputVariable($variable, $value) {
        if (is_string($value)) {
            return htmlspecialchars($value);
        }
        elseif (is_array($value)) {
            foreach ($value as $subvariable => $subvalue) {
                $value[$subvariable] = GantryWidgetRokMenu::_cleanOutputVariable($subvariable, $subvalue);
            }
            return $value;
        }
        return $value;
    }

    function _cleanInputVariable($variable, $value) {
        if (is_string($value)) {
            return stripslashes($value);
        }
        elseif (is_array($value)) {
            foreach ($value as $subvariable => $subvalue) {
                $value[$subvariable] = GantryWidgetRokMenu::_cleanInputVariable($subvariable, $subvalue);
            }
            return $value;
        }
        return $value;
    }

    function widget($args, $instance){
        global $gantry;
 		extract($args);
        $defaults = $this->_defaults;
        $instance = wp_parse_args((array) $instance, $defaults);
        foreach ($instance as $variable => $value)
        {
            $$variable = self::_cleanOutputVariable($variable, $value);
            $instance[$variable] = $$variable;
        }
        $this->render($args, $instance);
    }

}

RokNewsPager::$plugin_path = dirname($plugin);
RokNewsPager::$plugin_url = WP_PLUGIN_URL.'/'.basename(RokNewsPager::$plugin_path);

add_action('widgets_init', array("RokNewsPager", "init"));

// Load Language

load_plugin_textdomain('roknewspager', false, basename($roknewspager_plugin_path).'/languages/');

// Add AJAX

add_action('wp_ajax_roknewspager', 'roknewspager_callback');
add_action('wp_ajax_nopriv_roknewspager', 'roknewspager_callback');

function roknewspager_callback() {
	global $post, $wp_registered_widgets, $roknewspager_plugin_path, $roknewspager_plugin_url;
	$full_id = $_GET['id'];
	$offset = $_GET['offset'];
	$id = str_replace('widget-roknewspager-', '', $full_id);
	$option = get_option('widget_roknewspager');
	$settings = get_option('roknewspager_options');
	$instance = $option[$id];
	
	$catid = get_category_by_slug($instance['category']);
	$count = count(get_posts('numberposts=-1&cat='.$catid->term_id));
    $pages = ceil($count/$instance['posts_per_page']);
	$curpage = intval(($offset/$instance['posts_per_page'])+1);
	
	?>
	
	<?php if($instance['accordion']) : ?>
	
		<div class="roknewspager-wrapper" id="<?php echo $full_id; ?>">
			<div class="roknewspager">
			
				<?php $li_counter = 0; ?>
		
				<?php $roknewspager = new WP_Query('cat='.$catid->term_id.'&posts_per_page='.$instance['posts_per_page'].'&orderby='.$instance['order'].'&offset='.$offset.'&post_status=publish');
				if($roknewspager->have_posts()) : while($roknewspager->have_posts()) : $roknewspager->the_post(); ?>
				
				<?php $more = 0; ?>
			
				<?php $thumb = get_post_meta($post->ID, '_roknewspager_thumb', TRUE); ?>
		
				<div class="roknewspager-li">
					<h3 class="roknewspager-h3">
						<a href="<?php the_permalink(); ?>" class="roknewspager-title"><?php the_title(); ?></a>
						<span class="roknewspager-toggle"></span>
					</h3>
			        <div class="roknewspager-div">
			        	<div class="roknewspager-content">
				            <?php if($instance['thumbs'] && $thumb != ''): ?>
				                <?php if($instance['thumb_link']):?><a href="<?php the_permalink(); ?>"> <?php endif;?>
				                
				                <?php if($settings['thumb_generator'] == 'default') :
					                $image = roknewspager_resize('', $thumb, $instance['thumb_width'], $instance['thumb_height'], true); ?>
				                	<img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>" />
				                <?php else : ?>
				                	<img src="<?php echo $roknewspager_plugin_url.'/thumb.php?src='.$thumb.'&amp;w='.$instance['thumb_width'].'&amp;h='.$instance['thumb_height'].'&amp;zc=1&amp;q=75'; ?>" alt="<?php the_title(); ?>" />
				                <?php endif; ?>
			                    
			                    <?php if($instance['thumb_link']):?></a><?php endif;?>
				            <?php endif;?>
				            <?php if($instance['post_title']):?><a href="<?php the_permalink(); ?>" class="roknewspager-title"><?php the_title(); ?></a><?php endif;?>
							<?php if($instance['show_text']):?><div class="introtext"><?php if($instance['content'] == 'content') : echo prepareContent(get_the_content(false), $instance['allowed_tags']); else: echo prepareContent(get_the_excerpt(), $instance['allowed_tags']); endif; ?></div><?php endif;?>
							<?php if($instance['comments']):?><div class="commentcount"><span><?php comments_number('0', '1', '%'); ?></span></div><?php endif;?>
							<?php if($instance['author']):?><div class="author"><?php the_author(); ?></div><?php endif;?>
							<?php if($instance['date']):?><div class="published-date"><?php the_time('d F Y'); ?></div><?php endif;?>
				            <?php if($instance['more']):?><a href="<?php the_permalink(); ?>" class="readon"><span><?php echo $instance['more_label'];?></span></a><?php endif;?>
			        	</div>
			        </div>
				</div>
				
				<?php $li_counter++; ?>
		
				<?php endwhile; endif; ?>
				
				<?php if($li_counter < $instance['posts_per_page']) :
				for ($li_counter; $li_counter < $instance['posts_per_page']; $li_counter++) : ?>
				<div class="roknewspager-li" style="display:none;">
					<h3 class="roknewspager-h3">
						<span class="roknewspager-toggle"></span>
					</h3>
			        <div class="roknewspager-div">
			        	<div class="roknewspager-content">
			        	</div>
			        </div>
				</div>
				<?php endfor;
				endif; ?>
		
			</div>
		</div>
		<?php
			$disabled = ($pages == 1) ? " style='display: none;'" : '';
		?>
		<?php if($instance['paging']):?>
		<div class="roknewspager-pages" <?php echo $disabled; ?>>
			<div class="roknewspager-spinner"></div>
		    <div class="roknewspager-pages2">
		        <div class="roknewspager-prev"></div>
		        <div class="roknewspager-next"></div>
		        <ul class="roknewspager-numbers">
		            <?php for($x=1;$x<=$pages && $x <= $instance['max_pages'];$x++):?>
		            <li <?php if($x==$curpage):?>class="active"<?php endif; ?>><?php echo $x; ?></li>
		            <?php endfor;?>
		        </ul>
		    </div>
		</div>
		<?php endif;?>
	
	<?php else: ?>
	
		<div class="roknewspager-wrapper" id="<?php echo $full_id; ?>">
			<?php if($instance['comments']):?><div class="roknewspager-comments"><?php endif; ?>
			<ul class="roknewspager">
			
				<?php $li_counter = 0; ?>
			
				<?php $roknewspager = new WP_Query('cat='.$catid->term_id.'&posts_per_page='.$instance['posts_per_page'].'&orderby='.$instance['order'].'&offset='.$offset.'&post_status=publish');
				if($roknewspager->have_posts()) : while($roknewspager->have_posts()) : $roknewspager->the_post(); ?>
				
				<?php $more = 0; ?>
			
				<?php $thumb = get_post_meta($post->ID, '_roknewspager_thumb', TRUE); ?>
			
			    <li>
			        <div class="roknewspager-div">
			            <?php if($instance['thumbs'] && $thumb != ''): ?>
			                <?php if($instance['thumb_link']):?><a href="<?php the_permalink(); ?>"><?php endif;?>
			                
			                <?php if($settings['thumb_generator'] == 'default') :
				                $image = roknewspager_resize('', $thumb, $instance['thumb_width'], $instance['thumb_height'], true); ?>
			                	<img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>" />
			                <?php else : ?>
			                	<img src="<?php echo $roknewspager_plugin_url.'/thumb.php?src='.$thumb.'&amp;w='.$instance['thumb_width'].'&amp;h='.$instance['thumb_height'].'&amp;zc=1&amp;q=75'; ?>" alt="<?php the_title(); ?>" />
			                <?php endif; ?>
		                    
		                    <?php if($instance['thumb_link']):?></a><?php endif;?>
			            <?php endif;?>
			            <?php if($instance['post_title']):?><a href="<?php the_permalink(); ?>" class="roknewspager-title"><?php the_title(); ?></a><?php endif;?>
						<?php if($instance['show_text']):?><div class="introtext"><?php if($instance['content'] == 'content') : echo prepareContent(get_the_content(false), $instance['allowed_tags']); else: echo prepareContent(get_the_excerpt(), $instance['allowed_tags']); endif; ?></div><?php endif;?>
						<?php if($instance['comments']):?><div class="commentcount"><span><?php comments_number('0', '1', '%'); ?></span></div><?php endif;?>
						<?php if($instance['author']):?><div class="author"><?php the_author(); ?></div><?php endif;?>
						<?php if($instance['date']):?><div class="published-date"><?php the_time('d F Y'); ?></div><?php endif;?>
			            <?php if($instance['more']):?><a href="<?php the_permalink(); ?>" class="readon"><span><?php echo $instance['more_label'];?></span></a><?php endif;?>
			        </div>
			    </li>
			    
			    <?php $li_counter++; ?>
			
				<?php endwhile; endif; ?>
				
				<?php if($li_counter < $instance['posts_per_page']) :
				for ($li_counter; $li_counter < $instance['posts_per_page']; $li_counter++) : ?>
					<li style="display:none;"><div class="roknewspager-div"></div></li>
				<?php endfor;
				endif; ?>
			
			</ul>
			<?php if($instance['comments']):?></div><?php endif; ?>
		</div>
		<?php
			$disabled = ($pages == 1) ? " style='display: none;'" : '';
		?>
		<?php if($instance['paging']):?>
		<div class="roknewspager-pages" <?php echo $disabled; ?>>
			<div class="roknewspager-spinner"></div>
		    <div class="roknewspager-pages2">
		        <div class="roknewspager-prev"></div>
		        <div class="roknewspager-next"></div>
		        <ul class="roknewspager-numbers">
		            <?php for($x=1;$x<=$pages && $x <= $instance['max_pages'];$x++):?>
		            <li <?php if($x==$curpage):?>class="active"<?php endif; ?>><?php echo $x; ?></li>
		            <?php endfor;?>
		        </ul>
		    </div>
		</div>
		<?php endif;?>
		
	<?php endif;?>
	
	<?php wp_reset_query(); ?>
	
	<?php die();
}

// MooTools Enqueue Script

add_action('init','roknewspager_mootools_init',-50);
function roknewspager_mootools_init(){
	global $roknewspager_plugin_path, $roknewspager_plugin_url;
    wp_register_script('mootools.js', $roknewspager_plugin_url.'/js/mootools.js');
	wp_enqueue_script('mootools.js');
}

// RokNewsPager defaults

function roknewspager_options() {
	
	$roknewspager_options = array(
	
		'theme' => 'light',
		'load_custom_css' => '0',
		'thumb_generator' => 'default'
		
	);
	
	add_option('roknewspager_options', $roknewspager_options);
}

add_action('init','roknewspager_options');
	
// RokNewsPager Admin Stuff Settings

function roknewspager_admin_stuff() {
	register_setting('roknewspager_options_array', 'roknewspager_options');
}

if(is_admin()) {
	add_action('admin_init', 'roknewspager_admin_stuff');
}

// Add scripts

function roknewspager_script() {
	
	global $roknewspager_plugin_path, $roknewspager_plugin_url;

	$option = get_option('roknewspager_options');
	$theme = $option['theme'];
	
	wp_register_script('roknewspager.js', $roknewspager_plugin_url.'/js/roknewspager.js');
	wp_register_style('roknewspager.css', $roknewspager_plugin_url.'/themes/'.$theme.'/roknewspager.css');
	
	wp_enqueue_script('roknewspager.js');
	

	// Load style for ie6 or ie7 if exist

	$iebrowser = getBrowser();
	if ($iebrowser && $option['load_custom_css'] == '0') {
		if (file_exists("$roknewspager_plugin_path/themes/$theme/roknewspager-ie$iebrowser.php")) {
			wp_register_style('roknewspager-ie'.$iebrowser.'.php', $roknewspager_plugin_url.'/themes/'.$theme.'/roknewspager-ie'.$iebrowser.'.php');
			wp_enqueue_style('roknewspager-ie'.$iebrowser.'.php');
		}
		elseif (file_exists("$roknewspager_plugin_path/themes/$theme/roknewspager-ie$iebrowser.css")) {
		    wp_register_style('roknewspager-ie'.$iebrowser.'.css', $roknewspager_plugin_url.'/themes/'.$theme.'/roknewspager-ie'.$iebrowser.'.css');
			wp_enqueue_style('roknewspager-ie'.$iebrowser.'.css');
		}
	}

	if($option['load_custom_css'] == '0') :
		wp_enqueue_style('roknewspager.css');
	endif;
	
}

// Identify browser

if(!function_exists('getBrowser')) {

	function getBrowser() {
	
		$agent = (isset($_SERVER['HTTP_USER_AGENT'])) ? strtolower( $_SERVER['HTTP_USER_AGENT'] ) : false;
		$ie_version = false;
				
		if (preg_match("/msie/", $agent) && !preg_match("/opera/", $agent)){
	        $val = explode(" ",stristr($agent, "msie"));
	        $ver = explode(".", $val[1]);
			$ie_version = $ver[0];
			$ie_version = preg_replace("#[^0-9,.,a-z,A-Z]#i", "", $ie_version);
		}
		
		return $ie_version;
	
	}

}

// Add RokNewsPager meta box

function roknewspager_add_custom_box() {
     add_meta_box('roknewspager_box', 'RokNewsPager', 'roknewspager_custom_box', 'post', 'normal', 'high');
}

function roknewspager_custom_box() {
	global $post;
	$newspager_image = get_post_meta($post->ID, '_roknewspager_thumb', true);	
	echo '<input type="hidden" name="roknewspager_noncename" id="roknewspager_noncename" value="'.wp_create_nonce('rt_roknewspager').'" />';
	echo '<p>'.__('Please use links only to images that are located on the same server as your WordPress site. If automatic thumbnails aren\'t working for you please check if the <b>cache</b> directory inside of the RokNewsPager plugin dir has proper permissions.', 'roknewspager').'<br /><br />';
	echo '<label for="rt_image_box">'.__('Image Path:', 'roknewspager').'</label> ';
	echo '<input type="text" class="code" value="'.$newspager_image.'" id="rt_newspager_box" name="rt_newspager_box" style="width:99%;" /></p>';
}

function roknewspager_save_data($post_id) {
     // verify this with nonce because save_post can be triggered at other times
     if (!wp_verify_nonce($_POST['roknewspager_noncename'], 'rt_roknewspager')) return $post_id;
     
     // do not save if this is an auto save routine
     if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;

     $rt_newspager_box = trim($_POST['rt_newspager_box']);
     if($rt_newspager_box != '') :
    	update_post_meta($post_id, '_roknewspager_thumb', $rt_newspager_box);
	 else:
	 	delete_post_meta($post_id, '_roknewspager_thumb');
	 endif;
}

add_action('save_post', 'roknewspager_save_data');
add_action('admin_menu', 'roknewspager_add_custom_box');

// Add Settings

function roknewspager_settings_add($links) {
	$settings_link = '<a href="plugins.php?page=roknewspager-settings">'.__('Settings').'</a>';
	array_unshift($links, $settings_link);
	return $links;
}

function roknewspager_settings_action() {
	$plugin = plugin_basename(__FILE__); 
	add_filter('plugin_action_links_'.$plugin, 'roknewspager_settings_add');
}

add_action('admin_menu', 'roknewspager_settings_action');

// Plugin settings page

function roknewspager_menu() {
	add_plugins_page('RokNewsPager', 'RokNewsPager', 'activate_plugins', 'roknewspager-settings', 'roknewspager_settings_showup');  
}

add_action('admin_menu', 'roknewspager_menu', 9);

function roknewspager_admin_css() {

	global $roknewspager_plugin_path, $roknewspager_plugin_url; ?>
	
	<style type="text/css">
	#icon-roknewspager {
		background: url(<?php echo $roknewspager_plugin_url.'/roknewspager_big.png'; ?>) no-repeat 0 0;
	}
	.roknewspager-table table tr {height: 35px;}
	.roknewspager-table table td {vertical-align: middle;}
	</style>

<?php }

if(is_admin() && (isset($_GET['page']) && $_GET['page'] == 'roknewspager-settings')) {
	add_action('admin_head', 'roknewspager_admin_css');
}

// RokNewsPager settings page

function roknewspager_settings_showup() {
	
	$option = get_option('roknewspager_options');
	
	if(isset($_GET['updated']) && $_GET['updated'] == 'true') { ?><div id="message" class="updated fade"><p><?php _e('RokNewsPager settings saved.', 'roknewspager'); ?></p></div><?php } ?>
	
	<div class="wrap">
		<div class="icon32" id="icon-roknewspager"><br /></div>
		<h2>RokNewsPager</h2><br />
		
		<div style="margin: 0 auto; width: 50%;" class="roknewspager-table">
		
			<form method="post" action="options.php">
				<?php settings_fields('roknewspager_options_array'); ?>
				
				<table cellspacing="0" class="widefat fixed">
					<thead>
						<tr>
							<th></th>
							<th>
								<input type="submit" class="button" value="<?php _e('Save Changes', 'roknewspager'); ?>" style="padding: 3px; float: right;" />
							</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th></th>
							<th>
								<input type="submit" class="button" value="<?php _e('Save Changes', 'roknewspager'); ?>" style="padding: 3px; float: right;" />
							</th>
						</tr>
					</tfoot>
					<tbody>
						<tr valign="middle" class="alternate iedit">
							<td>
								<b><?php _e('Preset Themes', 'roknewspager'); ?></b></td>
							<td>
								<select id="theme" name="roknewspager_options[theme]">
				      			    <option value="light" <?php if ($option['theme'] == "light") : ?>selected="selected"<?php endif; ?>><?php _e('Light', 'roknewspager'); ?></option>
				      			    <option value="dark" <?php if ($option['theme'] == "dark") : ?>selected="selected"<?php endif; ?>><?php _e('Dark', 'roknewspager'); ?></option>
				                </select>
							</td>
						</tr>
						<tr valign="middle" class="iedit">
							<td>
								<b><?php _e('Thumbnails Generator:', 'roknewspager'); ?></b></td>
							<td>
								<select id="thumb_generator" name="roknewspager_options[thumb_generator]">
				      			    <option value="default" <?php if ($option['thumb_generator'] == "default") : ?>selected="selected"<?php endif; ?>><?php _e('Default', 'roknewspager'); ?></option>
				      			    <option value="timthumb" <?php if ($option['thumb_generator'] == "timthumb") : ?>selected="selected"<?php endif; ?>>TimThumb</option>
				                </select>
							</td>
						</tr>
						<tr valign="middle" class="alternate iedit">
							<td>
								<b><?php _e('Load Custom CSS', 'roknewspager'); ?></b>
							</td>
							<td>
								<input id="roknewspagercss-1" type="radio" value="1" name="roknewspager_options[load_custom_css]" <?php if($option['load_custom_css'] == '1') echo 'checked="checked"'; ?>/>
								<label for="roknewspagercss-1"><?php _e('Yes', 'roknewspager'); ?></label>&nbsp;&nbsp;
								<input id="roknewspagercss-0" type="radio" value="0" name="roknewspager_options[load_custom_css]" <?php if($option['load_custom_css'] == '0') echo 'checked="checked"'; ?>/>
								<label for="roknewspagercss-0"><?php _e('No', 'roknewspager'); ?></label>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		
		</div>
		
	</div>

<?php
 
}

/* Prepare Content */

if(!function_exists('prepareContent')) {
	function prepareContent($text, $tags_option) {
	
		$tags = explode(",", $tags_option);
		$strip_tags = array();
		for($i = 0; $i < count($tags); $i++) {
			$strip_tags[$i] = '<'.trim($tags[$i]).'>';
		}
		$tags = implode(',', $strip_tags);
		
		// strips tags won't remove the actual jscript
		$text = preg_replace( "'<script[^>]*>.*?</script>'si", "", $text );
		$text = preg_replace( '/{.+?}/', '', $text);
		//$text = preg_replace( "'<(br[^/>]*?/|hr[^/>]*?/|/(div|h[1-6]|li|p|td))>'si", ' ', $text );
		$text = strip_tags($text, $tags);
		
		return $text;

	}	
}

// Experimental image resize

/*
 * Resize images dynamically using wp built in functions
 * Victor Teixeira
 *
 * php 5.2+
 *
 * Example of use :
 * 
 * <?php 
 * $thumb = get_post_thumbnail_id(); 
 * $image = roknewspager_resize( $thumb, '', 140, 110, true );
 * ?>
 * <img src="<?php echo $image[url]; ?>" width="<?php echo $image[width]; ?>" height="<?php echo $image[height]; ?>" />
 *
 * @param int $attach_id
 * @param string $img_url
 * @param int $width
 * @param int $height
 * @param bool $crop
 * @return array
 */
 
if(!function_exists('roknewspager_resize')) {
	function roknewspager_resize( $attach_id = null, $img_url = null, $width, $height, $crop = false ) {
	
		global $roknewspager_plugin_path, $roknewspager_plugin_url;
	
		// this is an attachment, so we have the ID
		if ( $attach_id ) {
		
			$image_src = wp_get_attachment_image_src( $attach_id, 'full' );
			$file_path = get_attached_file( $attach_id );
		
		// this is not an attachment, let's use the image url
		} else if ( $img_url ) {
			
			$file_path = parse_url( $img_url );
			$file_path = $_SERVER['DOCUMENT_ROOT'] . $file_path['path'];
			
			//$file_path = ltrim( $file_path['path'], '/' );
			//$file_path = rtrim( ABSPATH, '/' ).$file_path['path'];
			
			$orig_size = @getimagesize( $file_path );
			
			$image_src[0] = $img_url;
			$image_src[1] = $orig_size[0];
			$image_src[2] = $orig_size[1];
		}
		
		$file_info = pathinfo( $file_path );
		$extension = '.'. $file_info['extension'];
	
		// the image path without the extension
		$no_ext_path = $roknewspager_plugin_path.'/cache/'.$file_info['filename'];
	
		$cropped_img_path = $no_ext_path.'-'.$width.'x'.$height.$extension;
	
		// checking if the file size is larger than the target size
		// if it is smaller or the same size, stop right here and return
		if ( $image_src[1] > $width || $image_src[2] > $height ) {
	
			// the file is larger, check if the resized version already exists (for $crop = true but will also work for $crop = false if the sizes match)
			if ( file_exists( $cropped_img_path ) ) {
	
				$default_url = str_replace(basename($image_src[0]), basename($cropped_img_path), $image_src[0]);
				$cropped_img_url = str_replace(dirname($image_src[0]), $roknewspager_plugin_url.'/cache', $default_url);
				
				$vt_image = array (
					'url' => $cropped_img_url,
					'width' => $width,
					'height' => $height
				);
				
				return $vt_image;
			}
	
			// $crop = false
			if ( $crop == false ) {
			
				// calculate the size proportionaly
				$proportional_size = wp_constrain_dimensions( $image_src[1], $image_src[2], $width, $height );
				$resized_img_path = $no_ext_path.'-'.$proportional_size[0].'x'.$proportional_size[1].$extension;		
	
				// checking if the file already exists
				if ( file_exists( $resized_img_path ) ) {
				
					$default_url = str_replace( basename( $image_src[0] ), basename( $resized_img_path ), $image_src[0] );
					$resized_img_url = str_replace(dirname($image_src[0]), $roknewspager_plugin_url.'/cache', $default_url);
	
					$vt_image = array (
						'url' => $resized_img_url,
						'width' => $proportional_size[0],
						'height' => $proportional_size[1]
					);
					
					return $vt_image;
				}
			}
	
			// no cache files - let's finally resize it
			$new_img_path = image_resize( $file_path, $width, $height, $crop, '', $roknewspager_plugin_path.'/cache' );
			$new_img_size = getimagesize( $new_img_path );
			$default_url = str_replace( basename( $image_src[0] ), basename( $new_img_path ), $image_src[0] );
			$new_img = str_replace(dirname($image_src[0]), $roknewspager_plugin_url.'/cache', $default_url);
	
			// resized output
			$vt_image = array (
				'url' => $new_img,
				'width' => $new_img_size[0],
				'height' => $new_img_size[1]
			);
			
			return $vt_image;
		}
	
		// default output - without resizing
		$vt_image = array (
			'url' => $image_src[0],
			'width' => $image_src[1],
			'height' => $image_src[2]
		);
		
		return $vt_image;
	}
}

?>