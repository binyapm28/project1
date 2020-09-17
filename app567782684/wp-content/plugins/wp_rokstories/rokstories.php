<?php

/**
 * @version   1.21 August 15, 2011
 * @author    RocketTheme, LLC http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2011 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
/*
Plugin Name: RokStories
Plugin URI: http://www.rockettheme.com
Description: RokStories is a great widget to display your posts and accompanying images as a featured item. The widget itself is facilitated by Mootools to transition between images and articles seamlessly. Perfect for showcasing featured posts or image on your site.
Author: RocketTheme, LLC
Version: 1.21
Author URI: http://www.rockettheme.com
License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
*/

// Define Directory Separator

if (!defined('DS')) {
	define('DS', DIRECTORY_SEPARATOR);
}

// Globals

global $rokstories_plugin_path, $rokstories_plugin_url, $browser_platform, $browser_name, $browser_version;
$rokstories_plugin_path = dirname($plugin);
$rokstories_plugin_url = WP_PLUGIN_URL. '/' .basename($rokstories_plugin_path);

require(dirname(__FILE__). DS .'rokbrowsercheck.php');

$browser_check = new RokBrowserCheck;
$browser_platform = $browser_check->platform;
$browser_name = $browser_check->name;
$browser_version = $browser_check->shortversion;

// Widget

class RokStories extends WP_Widget {

	// RocketTheme RokStories Widget
	// Port by Jakub Baran

    static $plugin_path;
    static $plugin_url;
    static $global_params = array('load_css');

    var $short_name = 'widget-rokstories';
    var $long_name = 'RokStories';
    var $description = 'RocketTheme RokStories Widget';
    var $css_classname = 'widget_rokstories';
    var $width = 700;
    var $height = 400;

    var $_defaults = array(
        'title' => '',
        'load_css' => '1',
        'layout_type' => 'layout1',
        'category' => 'uncategorized',  
        'article_count' => '4',
        'itemsOrdering' => 'date',
        'strip_tags' => 'a,i,br',
        'content_position' => 'right',
        'article_type' => 'post',
        'article_content' => 'content',
        'show_article_title' => '1',
        'show_created_date' => '0',
        'show_author' => '0',
        'show_article' => '1',
        'show_article_link' => '1',
        'legacy_readmore' => '0',
        'readmore_label' => 'Read the Full Story',
        'catch_first_image' => '0',
        'img_width' => '300',
        'img_height' => '200',
        'thumb_generator' => 'default',
        'thumb_width' => '90',
        'thumb_height' => '60',
        'start_width' => 'auto',
        'start_element' => '0',
        'thumbs_opacity' => '0.3',
        'fixed_height' => '0',
        'mouse_type' => 'click',
        'autoplay' => '0',
        'autoplay_delay' => '5000',
        'show_label_article_title' => '1',
        'show_arrows' => '1',
        'show_circles' => '1',
        'arrows_placement' => 'inside',
        'show_thumbs' => '0',
        'fixed_thumb' => '1',
        'link_titles' => '0',
        'link_labels' => '0',
        'link_images' => '0',
        'show_mask' => '1',
        'mask_desc_dir' => 'topdown',
        'mask_imgs_dir' => 'bottomup',
        'scrollerDuration' => '1000',
        'scrollerTransition' => 'Expo.easeInOut',
        'show_controls' => '1',
        'left_offset_x' => '-40',
        'left_offset_y' => '-100',
        'right_offset_x' => '-30',
        'right_offset_y' => '-100',
        'left_f_offset_x' => '-40',
        'left_f_offset_y' => '-100',
        'right_f_offset_x' => '-30',
        'right_f_offset_y' => '-100'
    );

    function init() {
    	global $browser_platform;
    	
    	// Don't show RokStories on iPhone or Android platform
    	if($browser_platform != 'iphone' || $browser_platform != 'android') :
	        register_widget("RokStories");
    	endif;
    }
    
    function rokstories_admin_style() {
		global $rokstories_plugin_url;
		
		// Load admin side CSS
		wp_register_style('rokstories_admin_css', $rokstories_plugin_url.'/admin/rokstories-admin.css');
		
		if(is_admin() && substr($_SERVER['PHP_SELF'], '-11', '11') == 'widgets.php') :
			wp_enqueue_style('rokstories_admin_css');
		endif;
	}
	
	function rokstories_scripts() {
		global $rokstories_plugin_url, $browser_name, $browser_version;

		// Register Styles and Scripts
		wp_register_style('rokstories_css', $rokstories_plugin_url.'/tmpl/css/rokstories.css');
		wp_register_style('rokstories_css_ie6', $rokstories_plugin_url.'/tmpl/css/rokstories-ie6.css');
		wp_register_style('rokstories_css_ie7', $rokstories_plugin_url.'/tmpl/css/rokstories-ie7.css');
		
		wp_register_script('rokstories_js', $rokstories_plugin_url.'/tmpl/js/rokstories.js');

        $global_option = get_option('widget_rokstories_globals');
        
        if($global_option == false) :
        	$global_option = array();
        endif;
        
        if (array_key_exists('load_css', $global_option) && $global_option['load_css'] == '1') {
        	// Enqueue Styles	
			if(!is_admin()) :
				wp_enqueue_style('rokstories_css');
				// Add IE6 and IE7 css style fixes
				if($browser_name == 'ie' && $browser_version == '6') :
					wp_enqueue_style('rokstories_css_ie6');
				elseif($browser_name == 'ie' && $browser_version == '7') :
					wp_enqueue_style('rokstories_css_ie7');
				endif;
			endif;
		}
		
		// Enqueue Styles and Scripts	
		if(!is_admin()) :
			wp_enqueue_script('rokstories_js');
		endif;

	}

	function rokstories_head() {
		// Add inline RokStories JS init
		if (!defined('ROKSTORIES')) {
			echo '<script type="text/javascript">var RokStoriesImage = {}, RokStoriesLinks = {};</script>'."\n";
            define('ROKSTORIES', 1);
		}

	}

    function update($new_instance, $old_instance) {
        $global_instance = array();
        foreach (self::$global_params as $param) {
            if (array_key_exists($param, $new_instance)) {
                $global_instance[$param] = $new_instance[$param];
                unset($new_instance[$param]);
            }
        }
        update_option('widget_rokstories_globals',$global_instance);

        return $new_instance;
    }

    function get_settings() {
        $global_option = get_option('widget_rokstories_globals');
        if($global_option == false) :
        	$global_option = array();
        endif;
        $settings = parent::get_settings();
        foreach($settings as $key=>$setting) {
            if (count($setting) > 0) {
                $settings[$key] = array_merge($setting, $global_option);
            }
        }
        return $settings;
    }
	
    function render($args, $instance) {
        global $more, $post, $rokstories_plugin_path, $rokstories_plugin_url;
        
        $widget_id = $this->number;
        
        $swidth = $instance['start_width'];
		$layout = $instance['layout_type'];
		$thumbsOpacity = $instance['thumbs_opacity'];
		if ($swidth == 'auto' || $layout == 'layout2') $swidth = "'auto'";
		if ($layout == 'layout2') $thumbsOpacity = 1;
		
		$tlx = $instance['left_offset_x'];
		$tly = $instance['left_offset_y'];
		$trx = $instance['right_offset_x'];
		$try = $instance['right_offset_y'];
		
		if ($instance['fixed_thumb'] == '1') {
			$tlx = $instance['left_f_offset_x'];
			$tly = $instance['left_f_offset_y'];
			$trx = $instance['right_f_offset_x'];
			$try = $instance['right_f_offset_y'];
		}
		
		$leftOffset = "{x: $tlx, y: $tly}";
		$rightOffset = "{x: $trx, y: $try}";
        
        ob_start();
        
        // Before Widget
        echo $args['before_widget'];
        
        // Widget Title
        if($instance['title'] != '')
 		echo $args['before_title'] . $instance['title'] . $args['after_title'];
 		
 		// Query Init
 		$catslug = get_category_by_slug($instance['category']);
		if($instance['article_type'] == 'post') : 
			$query_type = 'post_type='.$instance['article_type'].'&cat='.$catslug->term_id;
		else :
			$query_type = 'post_type='.$instance['article_type'].'&meta_key=_rokstories_image';
		endif;
		
		$rokstories = new WP_Query($query_type.'&posts_per_page='.$instance['article_count'].'&orderby='.$instance['itemsOrdering']);
 		
 		// Add RokStories JS code
		echo "<script type=\"text/javascript\">
		/* <![CDATA[ */
		RokStoriesImage['rokstories-{$widget_id}'] = [];
		RokStoriesLinks['rokstories-{$widget_id}'] = [];
		window.addEvent('domready', function() {
			new RokStories('rokstories-{$widget_id}', {
				'id': ".$widget_id.",
				'startElement': ".$instance['start_element'].",
				'thumbsOpacity': ".$thumbsOpacity.",
				'mousetype': '".$instance['mouse_type']."',
				'autorun': ".$instance['autoplay'].",
				'delay': ".$instance['autoplay_delay'].",
				'scrollerDuration': ".$instance['scrollerDuration'].",
				'scrollerTransition': Fx.Transitions.".$instance['scrollerTransition'].",
				'startWidth': ".$swidth.",
				'layout': '$layout',
				'linkedImgs': ".$instance['link_images'].",
				'showThumbs': ".$instance['show_thumbs'].",
				'fixedThumb': ".$instance['fixed_thumb'].",
				'mask': ".$instance['show_mask'].",
				'descsAnim': '".$instance['mask_desc_dir']."',
				'imgsAnim': '".$instance['mask_imgs_dir']."',
				'thumbLeftOffsets': $leftOffset,
				'thumbRightOffsets': $rightOffset
			});
		});\n";
		
		if($rokstories->have_posts()) : while($rokstories->have_posts()) : $rokstories->the_post();

			$image = get_post_meta($post->ID, '_rokstories_image', true);
			$first_image = $this->get_first_image();
		
			if($instance['thumb_generator'] == 'timthumb') :
				if($instance['catch_first_image'] == '1' && !empty($first_image)) : ?>
					RokStoriesImage['rokstories-<?php echo $widget_id; ?>'].push('<?php echo $rokstories_plugin_url.'/thumb.php?src='.$first_image.'&w='.$instance['img_width'].'&h='.$instance['img_height'].'&zc=1&q=75'; ?>');
				<?php else : ?>
					RokStoriesImage['rokstories-<?php echo $widget_id; ?>'].push('<?php echo $rokstories_plugin_url.'/thumb.php?src='.$image.'&w='.$instance['img_width'].'&h='.$instance['img_height'].'&zc=1&q=75'; ?>');
				<?php endif; 
			else :
				if($instance['catch_first_image'] == '1' && !empty($first_image)) :
					$vt_img = $this->rokstories_resize('', $first_image, $instance['img_width'], $instance['img_height'], true); ?>
					RokStoriesImage['rokstories-<?php echo $widget_id; ?>'].push('<?php echo $vt_img['url']; ?>');
				<?php else :
					$vt_img = $this->rokstories_resize('', $image, $instance['img_width'], $instance['img_height'], true); ?>
					RokStoriesImage['rokstories-<?php echo $widget_id; ?>'].push('<?php echo $vt_img['url']; ?>');
				<?php endif; 
			endif;
			
			if($instance['link_images'] == '1'): ?>
				RokStoriesLinks['rokstories-<?php echo $widget_id; ?>'].push('<?php the_permalink(); ?>');
			<?php endif;
			
		endwhile; endif;
		
		echo "/* ]]> */\n</script>\n";
 		
 		// Load Layouts	
		
		if($instance['layout_type'] == 'layout3') : 
			if(file_exists(TEMPLATEPATH. DS .'html'. DS .'plugins'. DS .'wp_rokstories'. DS .'layout3.php')) :	
		  		require(TEMPLATEPATH. DS .'html'. DS .'plugins'. DS .'wp_rokstories'. DS .'layout3.php');
		  	else :
  		  		require($rokstories_plugin_path. DS .'tmpl'. DS .'layout3.php'); 
  		  	endif;
		elseif($instance['layout_type'] == 'layout4') :
			if(file_exists(TEMPLATEPATH. DS .'html'. DS .'plugins'. DS .'wp_rokstories'. DS .'layout4.php')) :	
		  		require(TEMPLATEPATH. DS .'html'. DS .'plugins'. DS .'wp_rokstories'. DS .'layout4.php');
		  	else :
  		  		require($rokstories_plugin_path. DS .'tmpl'. DS .'layout4.php'); 
  		  	endif;
		elseif($instance['layout_type'] == 'layout5') :
			if(file_exists(TEMPLATEPATH. DS .'html'. DS .'plugins'. DS .'wp_rokstories'. DS .'layout5.php')) :	
		  		require(TEMPLATEPATH. DS .'html'. DS .'plugins'. DS .'wp_rokstories'. DS .'layout5.php');
		  	else :
  		  		require($rokstories_plugin_path. DS .'tmpl'. DS .'layout5.php'); 
  		  	endif;
  		elseif($instance['layout_type'] == 'layout6') :
			if(file_exists(TEMPLATEPATH. DS .'html'. DS .'plugins'. DS .'wp_rokstories'. DS .'layout6.php')) :	
		  		require(TEMPLATEPATH. DS .'html'. DS .'plugins'. DS .'wp_rokstories'. DS .'layout6.php');
		  	else :
  		  		require($rokstories_plugin_path. DS .'tmpl'. DS .'layout6.php'); 
  		  	endif;
  		elseif($instance['layout_type'] == 'layout7') :
			if(file_exists(TEMPLATEPATH. DS .'html'. DS .'plugins'. DS .'wp_rokstories'. DS .'layout7.php')) :	
		  		require(TEMPLATEPATH. DS .'html'. DS .'plugins'. DS .'wp_rokstories'. DS .'layout7.php');
		  	else :
  		  		require($rokstories_plugin_path. DS .'tmpl'. DS .'layout7.php'); 
  		  	endif;	
  		elseif($instance['layout_type'] == 'layout8') :
			if(file_exists(TEMPLATEPATH. DS .'html'. DS .'plugins'. DS .'wp_rokstories'. DS .'layout8.php')) :	
		  		require(TEMPLATEPATH. DS .'html'. DS .'plugins'. DS .'wp_rokstories'. DS .'layout8.php');
		  	else :
  		  		require($rokstories_plugin_path. DS .'tmpl'. DS .'layout8.php'); 
  		  	endif;			
		else :
			if(file_exists(TEMPLATEPATH. DS .'html'. DS .'plugins'. DS .'wp_rokstories'. DS .'default.php')) :	
		  		require(TEMPLATEPATH. DS .'html'. DS .'plugins'. DS .'wp_rokstories'. DS .'default.php');
		  	else :
  		  		require($rokstories_plugin_path. DS .'tmpl'. DS .'default.php'); 
  		  	endif;
		endif;
		
		wp_reset_query();
        
        // After Widget
        echo $args['after_widget'];
        
        echo ob_get_clean();
    }
    
    function form($instance) {
    	global $rokstories_plugin_path, $rokstories_plugin_url;
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
		
		<!-- Begin RokStories Widget Admin -->
		
		<div class="rokstories-admin-wrapper">
			<div class="rokstories-leftcol">
				<h3><?php _e('General Parameters', 'rokstories'); ?></h3>
				<div class="param">
			        <label class="desc rok-tips" data-tips="This is your title description" for="<?php echo $this->get_field_id('title'); ?>">
			        	<?php _e('Title', 'rokstories'); ?>
			        </label>
			    	<input class="inputbox" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
		    	</div>
		    	
		    	<div class="param">
			    	<label class="desc" for="<?php echo $this->get_field_id('category'); ?>">
			    		<?php _e('Load built-in StyleSheet', 'rokstories'); ?>
			    	</label>
					<input id="<?php echo $this->get_field_id('load_css'); ?>0" type="radio" value="0" name="<?php echo $this->get_field_name('load_css'); ?>" <?php if($instance['load_css'] == '0') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('load_css'); ?>0"><?php _e('No', 'rokstories'); ?></label>&nbsp;&nbsp;
					<input id="<?php echo $this->get_field_id('load_css'); ?>1" type="radio" value="1" name="<?php echo $this->get_field_name('load_css'); ?>" <?php if($instance['load_css'] == '1') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('load_css'); ?>1"><?php _e('Yes', 'rokstories'); ?></label>
				</div>				
				
				<div class="param">
					<label class="desc" for="<?php echo $this->get_field_id('layout_type'); ?>">
						<?php _e('Layout Type', 'rokstories'); ?>
					</label>
			    	<select id="<?php echo $this->get_field_id('layout_type'); ?>" name="<?php echo $this->get_field_name('layout_type'); ?>">
			      		<option value="layout1"<?php selected($instance['layout_type'], 'layout1'); ?>><?php _e('Default', 'rokstories'); ?></option>
			      		<option value="layout2"<?php selected($instance['layout_type'], 'layout2'); ?>><?php _e('Showcase', 'rokstories'); ?></option>
			      		<option value="layout3"<?php selected($instance['layout_type'], 'layout3'); ?>><?php _e('Compact Showcase', 'rokstories'); ?></option>
			      		<option value="layout4"<?php selected($instance['layout_type'], 'layout4'); ?>><?php _e('Compact Showcase and Numbers', 'rokstories'); ?></option>
			      		<option value="layout5"<?php selected($instance['layout_type'], 'layout5'); ?>><?php _e('Masked Showcase', 'rokstories'); ?></option>
			      		<option value="layout6"<?php selected($instance['layout_type'], 'layout6'); ?>><?php _e('Scroller', 'rokstories'); ?></option>
			      		<option value="layout7"<?php selected($instance['layout_type'], 'layout7'); ?>><?php _e('Scroller Showcase', 'rokstories'); ?></option>
			      		<option value="layout8"<?php selected($instance['layout_type'], 'layout8'); ?>><?php _e('Showcase Tabs', 'rokstories'); ?></option>
			        </select>
				</div>
		    	
		    	<div class="param">
			    	<label class="desc" for="<?php echo $this->get_field_id('category'); ?>">
			    		<?php _e('Content Category', 'rokstories'); ?>
			    	</label>
					<select name="<?php echo $this->get_field_name('category'); ?>" id="<?php echo $this->get_field_id('category'); ?>">
						<?php foreach ($categories as $cat) { ?>
							<option value="<?php echo $cat->slug; ?>"<?php if($instance['category'] == $cat->slug) : echo ' selected="selected"'; endif; ?>><?php echo $cat->name; ?></option>
						<?php } ?>
					</select>
				</div>
				
				<div class="param">
					<label class="desc" for="<?php echo $this->get_field_id('article_type'); ?>">
						<?php _e('Content Type', 'rokstories'); ?>
					</label>
			    	<select id="<?php echo $this->get_field_id('article_type'); ?>" name="<?php echo $this->get_field_name('article_type'); ?>">
			      		<option value="post"<?php selected($instance['article_type'], 'post'); ?>><?php _e('Posts', 'rokstories'); ?></option>
			      		<option value="page"<?php selected($instance['article_type'], 'page'); ?>><?php _e('Pages', 'rokstories'); ?></option>
			        </select>
				</div>
				
				<div class="param">
					<label class="desc" for="<?php echo $this->get_field_id('article_content'); ?>">
						<?php _e('Choose Content', 'rokstories'); ?>
					</label>
			    	<select id="<?php echo $this->get_field_id('article_content'); ?>" name="<?php echo $this->get_field_name('article_content'); ?>">
			      		<option value="content"<?php selected($instance['article_content'], 'content'); ?>><?php _e('Content', 'rokstories'); ?></option>
			      		<option value="excerpt"<?php selected($instance['article_content'], 'excerpt'); ?>><?php _e('Excerpt', 'rokstories'); ?></option>
			        </select>
				</div>
				
				<div class="param">
					<label class="desc" for="<?php echo $this->get_field_id('article_count'); ?>">
			        	<?php _e('Max Number of Posts', 'rokstories'); ?>
			        </label>
			    	<input class="smallinputbox" id="<?php echo $this->get_field_id('article_count'); ?>" name="<?php echo $this->get_field_name('article_count'); ?>" type="text" value="<?php echo $instance['article_count']; ?>" />
				</div>
				
				<div class="param">
					<label class="desc" for="<?php echo $this->get_field_id('itemsOrdering'); ?>"><?php _e('Order', 'rokstories'); ?></label>
			    	<select id="<?php echo $this->get_field_id('itemsOrdering'); ?>" name="<?php echo $this->get_field_name('itemsOrdering'); ?>">
			      		<option value="author"<?php selected($instance['itemsOrdering'], 'author'); ?>><?php _e('Author', 'rokstories'); ?></option>
			      		<option value="date"<?php selected($instance['itemsOrdering'], 'date'); ?>><?php _e('Date', 'rokstories'); ?></option>
			      		<option value="title"<?php selected($instance['itemsOrdering'], 'title'); ?>><?php _e('Title', 'rokstories'); ?></option>
			      		<option value="modified"<?php selected($instance['itemsOrdering'], 'modified'); ?>><?php _e('Modified', 'rokstories'); ?></option>
			      		<option value="menu_order"<?php selected($instance['itemsOrdering'], 'menu_order'); ?>><?php _e('Menu Order', 'rokstories'); ?></option>
			      		<option value="parent"<?php selected($instance['itemsOrdering'], 'parent'); ?>><?php _e('Parent', 'rokstories'); ?></option>
			      		<option value="id"<?php selected($instance['itemsOrdering'], 'id'); ?>>ID</option>
			        </select>
				</div>
				
				<div class="param">
					<label class="desc" for="<?php echo $this->get_field_id('strip_tags'); ?>">
			        	<?php _e('Allowed HTML tags', 'rokstories'); ?>
			        </label>
			    	<input class="inputbox" id="<?php echo $this->get_field_id('strip_tags'); ?>" name="<?php echo $this->get_field_name('strip_tags'); ?>" type="text" value="<?php echo $instance['strip_tags']; ?>" />
				</div>
				
				<div class="param">
					<label class="desc" for="<?php echo $this->get_field_id('content_position'); ?>"><?php _e('Content Position', 'rokstories'); ?></label>
			    	<select id="<?php echo $this->get_field_id('content_position'); ?>" name="<?php echo $this->get_field_name('content_position'); ?>">
			      		<option value="right"<?php selected($instance['content_position'], 'right'); ?>><?php _e('Left', 'rokstories'); ?></option>
			      		<option value="left"<?php selected($instance['content_position'], 'left'); ?>><?php _e('Right', 'rokstories'); ?></option>
			      		<option value="none"<?php selected($instance['content_position'], 'none'); ?>><?php _e('None', 'rokstories'); ?></option>
			        </select>
				</div>
				
				<div class="param">
			    	<label class="desc" for="<?php echo $this->get_field_id('show_article_title'); ?>">
			    		<?php _e('Show Title', 'rokstories'); ?>
			    	</label>
					<input id="<?php echo $this->get_field_id('show_article_title'); ?>0" type="radio" value="0" name="<?php echo $this->get_field_name('show_article_title'); ?>" <?php if($instance['show_article_title'] == '0') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('show_article_title'); ?>0"><?php _e('No', 'rokstories'); ?></label>&nbsp;&nbsp;
					<input id="<?php echo $this->get_field_id('show_article_title'); ?>1" type="radio" value="1" name="<?php echo $this->get_field_name('show_article_title'); ?>" <?php if($instance['show_article_title'] == '1') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('show_article_title'); ?>1"><?php _e('Yes', 'rokstories'); ?></label>
				</div>	
				
				<div class="param">
			    	<label class="desc" for="<?php echo $this->get_field_id('show_created_date'); ?>">
			    		<?php _e('Show Date', 'rokstories'); ?>
			    	</label>
					<input id="<?php echo $this->get_field_id('show_created_date'); ?>0" type="radio" value="0" name="<?php echo $this->get_field_name('show_created_date'); ?>" <?php if($instance['show_created_date'] == '0') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('show_created_date'); ?>0"><?php _e('No', 'rokstories'); ?></label>&nbsp;&nbsp;
					<input id="<?php echo $this->get_field_id('show_created_date'); ?>1" type="radio" value="1" name="<?php echo $this->get_field_name('show_created_date'); ?>" <?php if($instance['show_created_date'] == '1') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('show_created_date'); ?>1"><?php _e('Yes', 'rokstories'); ?></label>
				</div>
				
				<div class="param">
			    	<label class="desc" for="<?php echo $this->get_field_id('show_author'); ?>">
			    		<?php _e('Show Author', 'rokstories'); ?>
			    	</label>
					<input id="<?php echo $this->get_field_id('show_author'); ?>0" type="radio" value="0" name="<?php echo $this->get_field_name('show_author'); ?>" <?php if($instance['show_author'] == '0') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('show_author'); ?>0"><?php _e('No', 'rokstories'); ?></label>&nbsp;&nbsp;
					<input id="<?php echo $this->get_field_id('show_author'); ?>1" type="radio" value="1" name="<?php echo $this->get_field_name('show_author'); ?>" <?php if($instance['show_author'] == '1') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('show_author'); ?>1"><?php _e('Yes', 'rokstories'); ?></label>
				</div>
				
				<div class="param">
			    	<label class="desc" for="<?php echo $this->get_field_id('show_article'); ?>">
			    		<?php _e('Show Content', 'rokstories'); ?>
			    	</label>
					<input id="<?php echo $this->get_field_id('show_article'); ?>0" type="radio" value="0" name="<?php echo $this->get_field_name('show_article'); ?>" <?php if($instance['show_article'] == '0') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('show_article'); ?>0"><?php _e('No', 'rokstories'); ?></label>&nbsp;&nbsp;
					<input id="<?php echo $this->get_field_id('show_article'); ?>1" type="radio" value="1" name="<?php echo $this->get_field_name('show_article'); ?>" <?php if($instance['show_article'] == '1') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('show_article'); ?>1"><?php _e('Yes', 'rokstories'); ?></label>
				</div>
				
				<div class="param">
			    	<label class="desc" for="<?php echo $this->get_field_id('show_article_link'); ?>">
			    		<?php _e('Show Link', 'rokstories'); ?>
			    	</label>
					<input id="<?php echo $this->get_field_id('show_article_link'); ?>0" type="radio" value="0" name="<?php echo $this->get_field_name('show_article_link'); ?>" <?php if($instance['show_article_link'] == '0') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('show_article_link'); ?>0"><?php _e('No', 'rokstories'); ?></label>&nbsp;&nbsp;
					<input id="<?php echo $this->get_field_id('show_article_link'); ?>1" type="radio" value="1" name="<?php echo $this->get_field_name('show_article_link'); ?>" <?php if($instance['show_article_link'] == '1') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('show_article_link'); ?>1"><?php _e('Yes', 'rokstories'); ?></label>
				</div>
				
				<div class="param">
			    	<label class="desc" for="<?php echo $this->get_field_id('legacy_readmore'); ?>">
			    		<?php _e('Readon Style', 'rokstories'); ?>
			    	</label>
					<input id="<?php echo $this->get_field_id('legacy_readmore'); ?>1" type="radio" value="1" name="<?php echo $this->get_field_name('legacy_readmore'); ?>" <?php if($instance['legacy_readmore'] == '1') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('legacy_readmore'); ?>1"><?php _e('Legacy', 'rokstories'); ?></label>&nbsp;&nbsp;
					<input id="<?php echo $this->get_field_id('legacy_readmore'); ?>0" type="radio" value="0" name="<?php echo $this->get_field_name('legacy_readmore'); ?>" <?php if($instance['legacy_readmore'] == '0') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('legacy_readmore'); ?>0"><?php _e('Standard', 'rokstories'); ?></label>
				</div>
				
				<div class="param">
					<label class="desc" for="<?php echo $this->get_field_id('readmore_label'); ?>">
			        	<?php _e('Readon Label', 'rokstories'); ?>
			        </label>
			    	<input class="inputbox" id="<?php echo $this->get_field_id('readmore_label'); ?>" name="<?php echo $this->get_field_name('readmore_label'); ?>" type="text" value="<?php echo $instance['readmore_label']; ?>" />
				</div>
				
				<div class="param">
			    	<label class="desc" for="<?php echo $this->get_field_id('catch_first_image'); ?>">
			    		<?php _e('Catch First Image', 'rokstories'); ?>
			    	</label>
					<input id="<?php echo $this->get_field_id('catch_first_image'); ?>0" type="radio" value="0" name="<?php echo $this->get_field_name('catch_first_image'); ?>" <?php if($instance['catch_first_image'] == '0') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('catch_first_image'); ?>0"><?php _e('No', 'rokstories'); ?></label>&nbsp;&nbsp;
					<input id="<?php echo $this->get_field_id('catch_first_image'); ?>1" type="radio" value="1" name="<?php echo $this->get_field_name('catch_first_image'); ?>" <?php if($instance['catch_first_image'] == '1') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('catch_first_image'); ?>1"><?php _e('Yes', 'rokstories'); ?></label>
				</div>
				
				<div class="param">
					<label class="desc" for="<?php echo $this->get_field_id('img_width'); ?>">
			        	<?php _e('Image Dimensions (px)', 'rokstories'); ?>
			        </label>
			    	<input class="smallinputbox" id="<?php echo $this->get_field_id('img_width'); ?>" name="<?php echo $this->get_field_name('img_width'); ?>" type="text" value="<?php echo $instance['img_width']; ?>" /> x 
			    	<input class="smallinputbox" id="<?php echo $this->get_field_id('img_height'); ?>" name="<?php echo $this->get_field_name('img_height'); ?>" type="text" value="<?php echo $instance['img_height']; ?>" />
				</div>
				
				<div class="param">
					<label class="desc" for="<?php echo $this->get_field_id('thumb_width'); ?>">
			        	<?php _e('Thumbnail Dimensions (px)', 'rokstories'); ?>
			        </label>
			    	<input class="smallinputbox" id="<?php echo $this->get_field_id('thumb_width'); ?>" name="<?php echo $this->get_field_name('thumb_width'); ?>" type="text" value="<?php echo $instance['thumb_width']; ?>" /> x 
			    	<input class="smallinputbox" id="<?php echo $this->get_field_id('thumb_height'); ?>" name="<?php echo $this->get_field_name('thumb_height'); ?>" type="text" value="<?php echo $instance['thumb_height']; ?>" />
				</div>
				
				<div class="param">
					<label class="desc" for="<?php echo $this->get_field_id('thumb_generator'); ?>">
						<?php _e('Image Generator', 'rokstories'); ?>
					</label>
			    	<select id="<?php echo $this->get_field_id('thumb_generator'); ?>" name="<?php echo $this->get_field_name('thumb_generator'); ?>">
			      		<option value="default"<?php selected($instance['thumb_generator'], 'default'); ?>><?php _e('Default', 'rokstories'); ?></option>
			      		<option value="timthumb"<?php selected($instance['thumb_generator'], 'timthumb'); ?>><?php _e('TimThumb', 'rokstories'); ?></option>
			        </select>
				</div>
				
				<div class="param">
					<label class="desc" for="<?php echo $this->get_field_id('start_width'); ?>">
			        	<?php _e('Width of Thumbnail Display (px)', 'rokstories'); ?>
			        </label>
			    	<input class="smallinputbox" id="<?php echo $this->get_field_id('start_width'); ?>" name="<?php echo $this->get_field_name('start_width'); ?>" type="text" value="<?php echo $instance['start_width']; ?>" />
				</div>
				
				<div class="param">
					<label class="desc" for="<?php echo $this->get_field_id('start_element'); ?>">
			        	<?php _e('First Article', 'rokstories'); ?>
			        </label>
			    	<input class="smallinputbox" id="<?php echo $this->get_field_id('start_element'); ?>" name="<?php echo $this->get_field_name('start_element'); ?>" type="text" value="<?php echo $instance['start_element']; ?>" />
					<span class="small">&nbsp;<?php _e('(first is 0, second 1, etc.)', 'rokstories'); ?></span>
				</div>
				
				<div class="param">
					<label class="desc" for="<?php echo $this->get_field_id('thumbs_opacity'); ?>">
			        	<?php _e('Thumbs Opacity', 'rokstories'); ?>
			        </label>
			    	<input class="smallinputbox" id="<?php echo $this->get_field_id('thumbs_opacity'); ?>" name="<?php echo $this->get_field_name('thumbs_opacity'); ?>" type="text" value="<?php echo $instance['thumbs_opacity']; ?>" />
				</div>
				
				<div class="param">
					<label class="desc" for="<?php echo $this->get_field_id('fixed_height'); ?>">
			        	<?php _e('Fixed Height (px)', 'rokstories'); ?>
			        </label>
			    	<input class="smallinputbox" id="<?php echo $this->get_field_id('fixed_height'); ?>" name="<?php echo $this->get_field_name('fixed_height'); ?>" type="text" value="<?php echo $instance['fixed_height']; ?>" />
				</div>
				
				<div class="param">
					<label class="desc" for="<?php echo $this->get_field_id('mouse_type'); ?>">
						<?php _e('Navigation Interaction', 'rokstories'); ?>
					</label>
			    	<select id="<?php echo $this->get_field_id('mouse_type'); ?>" name="<?php echo $this->get_field_name('mouse_type'); ?>">
			      		<option value="click"<?php selected($instance['mouse_type'], 'click'); ?>><?php _e('Click', 'rokstories'); ?></option>
			      		<option value="mouseenter"<?php selected($instance['mouse_type'], 'mouseenter'); ?>><?php _e('Mouseover', 'rokstories'); ?></option>
			        </select>
				</div>
				
				<div class="param">
			    	<label class="desc" for="<?php echo $this->get_field_id('autoplay'); ?>">
			    		<?php _e('Autoplay', 'rokstories'); ?>
			    	</label>
					<input id="<?php echo $this->get_field_id('autoplay'); ?>0" type="radio" value="0" name="<?php echo $this->get_field_name('autoplay'); ?>" <?php if($instance['autoplay'] == '0') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('autoplay'); ?>0"><?php _e('No', 'rokstories'); ?></label>&nbsp;&nbsp;
					<input id="<?php echo $this->get_field_id('autoplay'); ?>1" type="radio" value="1" name="<?php echo $this->get_field_name('autoplay'); ?>" <?php if($instance['autoplay'] == '1') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('autoplay'); ?>1"><?php _e('Yes', 'rokstories'); ?></label>
				</div>
				
				<div class="param">
					<label class="desc" for="<?php echo $this->get_field_id('autoplay_delay'); ?>">
			        	<?php _e('Autoplay Delay (ms)', 'rokstories'); ?>
			        </label>
			    	<input class="smallinputbox" id="<?php echo $this->get_field_id('autoplay_delay'); ?>" name="<?php echo $this->get_field_name('autoplay_delay'); ?>" type="text" value="<?php echo $instance['autoplay_delay']; ?>" />
				</div>		
			</div>
			<div class="rokstories-rightcol">
				<h3><?php _e('Additional Showcase Type Parameters', 'rokstories'); ?></h3>
				<div class="param">
			    	<label class="desc" for="<?php echo $this->get_field_id('show_label_article_title'); ?>">
			    		<?php _e('Show Label Title', 'rokstories'); ?>
			    	</label>
					<input id="<?php echo $this->get_field_id('show_label_article_title'); ?>0" type="radio" value="0" name="<?php echo $this->get_field_name('show_label_article_title'); ?>" <?php if($instance['show_label_article_title'] == '0') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('show_label_article_title'); ?>0"><?php _e('No', 'rokstories'); ?></label>&nbsp;&nbsp;
					<input id="<?php echo $this->get_field_id('show_label_article_title'); ?>1" type="radio" value="1" name="<?php echo $this->get_field_name('show_label_article_title'); ?>" <?php if($instance['show_label_article_title'] == '1') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('show_label_article_title'); ?>1"><?php _e('Yes', 'rokstories'); ?></label>
				</div>
				
				<div class="param">
			    	<label class="desc" for="<?php echo $this->get_field_id('show_arrows'); ?>">
			    		<?php _e('Show Arrows', 'rokstories'); ?>
			    	</label>
					<input id="<?php echo $this->get_field_id('show_arrows'); ?>0" type="radio" value="0" name="<?php echo $this->get_field_name('show_arrows'); ?>" <?php if($instance['show_arrows'] == '0') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('show_arrows'); ?>0"><?php _e('No', 'rokstories'); ?></label>&nbsp;&nbsp;
					<input id="<?php echo $this->get_field_id('show_arrows'); ?>1" type="radio" value="1" name="<?php echo $this->get_field_name('show_arrows'); ?>" <?php if($instance['show_arrows'] == '1') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('show_arrows'); ?>1"><?php _e('Yes', 'rokstories'); ?></label>
				</div>
				
				<div class="param">
			    	<label class="desc" for="<?php echo $this->get_field_id('show_circles'); ?>">
			    		<?php _e('Show Circles', 'rokstories'); ?>
			    	</label>
					<input id="<?php echo $this->get_field_id('show_circles'); ?>0" type="radio" value="0" name="<?php echo $this->get_field_name('show_circles'); ?>" <?php if($instance['show_circles'] == '0') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('show_circles'); ?>0"><?php _e('No', 'rokstories'); ?></label>&nbsp;&nbsp;
					<input id="<?php echo $this->get_field_id('show_circles'); ?>1" type="radio" value="1" name="<?php echo $this->get_field_name('show_circles'); ?>" <?php if($instance['show_circles'] == '1') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('show_circles'); ?>1"><?php _e('Yes', 'rokstories'); ?></label>
				</div>
				
				<div class="param">
			    	<label class="desc" for="<?php echo $this->get_field_id('arrows_placement'); ?>">
			    		<?php _e('Arrows Placement', 'rokstories'); ?>
			    	</label>
					<input id="<?php echo $this->get_field_id('arrows_placement'); ?>0" type="radio" value="inside" name="<?php echo $this->get_field_name('arrows_placement'); ?>" <?php if($instance['arrows_placement'] == 'inside') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('arrows_placement'); ?>0"><?php _e('Inside', 'rokstories'); ?></label>&nbsp;&nbsp;
					<input id="<?php echo $this->get_field_id('arrows_placement'); ?>1" type="radio" value="outside" name="<?php echo $this->get_field_name('arrows_placement'); ?>" <?php if($instance['arrows_placement'] == 'outside') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('arrows_placement'); ?>1"><?php _e('Outside', 'rokstories'); ?></label>
				</div>
				
				<div class="param">
			    	<label class="desc" for="<?php echo $this->get_field_id('show_thumbs'); ?>">
			    		<?php _e('Show Previews on Arrows', 'rokstories'); ?>
			    	</label>
					<input id="<?php echo $this->get_field_id('show_thumbs'); ?>0" type="radio" value="0" name="<?php echo $this->get_field_name('show_thumbs'); ?>" <?php if($instance['show_thumbs'] == '0') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('show_thumbs'); ?>0"><?php _e('No', 'rokstories'); ?></label>&nbsp;&nbsp;
					<input id="<?php echo $this->get_field_id('show_thumbs'); ?>1" type="radio" value="1" name="<?php echo $this->get_field_name('show_thumbs'); ?>" <?php if($instance['show_thumbs'] == '1') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('show_thumbs'); ?>1"><?php _e('Yes', 'rokstories'); ?></label>
				</div>
				
				<div class="param">
			    	<label class="desc" for="<?php echo $this->get_field_id('fixed_thumb'); ?>">
			    		<?php _e('Fixed Previews', 'rokstories'); ?>
			    	</label>
					<input id="<?php echo $this->get_field_id('fixed_thumb'); ?>0" type="radio" value="0" name="<?php echo $this->get_field_name('fixed_thumb'); ?>" <?php if($instance['fixed_thumb'] == '0') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('fixed_thumb'); ?>0"><?php _e('No', 'rokstories'); ?></label>&nbsp;&nbsp;
					<input id="<?php echo $this->get_field_id('fixed_thumb'); ?>1" type="radio" value="1" name="<?php echo $this->get_field_name('fixed_thumb'); ?>" <?php if($instance['fixed_thumb'] == '1') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('fixed_thumb'); ?>1"><?php _e('Yes', 'rokstories'); ?></label>
				</div>
				
				<div class="param">
			    	<label class="desc" for="<?php echo $this->get_field_id('link_titles'); ?>">
			    		<?php _e('Linked Titles', 'rokstories'); ?>
			    	</label>
					<input id="<?php echo $this->get_field_id('link_titles'); ?>0" type="radio" value="0" name="<?php echo $this->get_field_name('link_titles'); ?>" <?php if($instance['link_titles'] == '0') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('link_titles'); ?>0"><?php _e('No', 'rokstories'); ?></label>&nbsp;&nbsp;
					<input id="<?php echo $this->get_field_id('link_titles'); ?>1" type="radio" value="1" name="<?php echo $this->get_field_name('link_titles'); ?>" <?php if($instance['link_titles'] == '1') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('link_titles'); ?>1"><?php _e('Yes', 'rokstories'); ?></label>
				</div>
				
				<div class="param">
			    	<label class="desc" for="<?php echo $this->get_field_id('link_labels'); ?>">
			    		<?php _e('Linked Labels', 'rokstories'); ?>
			    	</label>
					<input id="<?php echo $this->get_field_id('link_labels'); ?>0" type="radio" value="0" name="<?php echo $this->get_field_name('link_labels'); ?>" <?php if($instance['link_labels'] == '0') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('link_labels'); ?>0"><?php _e('No', 'rokstories'); ?></label>&nbsp;&nbsp;
					<input id="<?php echo $this->get_field_id('link_labels'); ?>1" type="radio" value="1" name="<?php echo $this->get_field_name('link_labels'); ?>" <?php if($instance['link_labels'] == '1') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('link_labels'); ?>1"><?php _e('Yes', 'rokstories'); ?></label>
				</div>
				
				<div class="param">
			    	<label class="desc" for="<?php echo $this->get_field_id('link_images'); ?>">
			    		<?php _e('Linked Images', 'rokstories'); ?>
			    	</label>
					<input id="<?php echo $this->get_field_id('link_images'); ?>0" type="radio" value="0" name="<?php echo $this->get_field_name('link_images'); ?>" <?php if($instance['link_images'] == '0') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('link_images'); ?>0"><?php _e('No', 'rokstories'); ?></label>&nbsp;&nbsp;
					<input id="<?php echo $this->get_field_id('link_images'); ?>1" type="radio" value="1" name="<?php echo $this->get_field_name('link_images'); ?>" <?php if($instance['link_images'] == '1') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('link_images'); ?>1"><?php _e('Yes', 'rokstories'); ?></label>
				</div>
				
				<div class="param">
			    	<label class="desc" for="<?php echo $this->get_field_id('show_mask'); ?>">
			    		<?php _e('Show Image Mask', 'rokstories'); ?>
			    	</label>
					<input id="<?php echo $this->get_field_id('show_mask'); ?>0" type="radio" value="0" name="<?php echo $this->get_field_name('show_mask'); ?>" <?php if($instance['show_mask'] == '0') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('show_mask'); ?>0"><?php _e('No', 'rokstories'); ?></label>&nbsp;&nbsp;
					<input id="<?php echo $this->get_field_id('show_mask'); ?>1" type="radio" value="1" name="<?php echo $this->get_field_name('show_mask'); ?>" <?php if($instance['show_mask'] == '1') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('show_mask'); ?>1"><?php _e('Yes', 'rokstories'); ?></label>
				</div>
				
				<div class="param">
					<label class="desc" for="<?php echo $this->get_field_id('mask_desc_dir'); ?>">
						<?php _e('Description Animation', 'rokstories'); ?>
					</label>
			    	<select id="<?php echo $this->get_field_id('mask_desc_dir'); ?>" name="<?php echo $this->get_field_name('mask_desc_dir'); ?>">
			      		<option value="topdown"<?php selected($instance['mask_desc_dir'], 'topdown'); ?>><?php _e('Top Down', 'rokstories'); ?></option>
			      		<option value="bottomup"<?php selected($instance['mask_desc_dir'], 'bottomup'); ?>><?php _e('Bottom Up', 'rokstories'); ?></option>
			      		<option value="fade"<?php selected($instance['mask_desc_dir'], 'fade'); ?>><?php _e('Fade', 'rokstories'); ?></option>
			        </select>
				</div>
				
				<div class="param">
					<label class="desc" for="<?php echo $this->get_field_id('mask_imgs_dir'); ?>">
						<?php _e('Images Animation', 'rokstories'); ?>
					</label>
			    	<select id="<?php echo $this->get_field_id('mask_imgs_dir'); ?>" name="<?php echo $this->get_field_name('mask_imgs_dir'); ?>">
			      		<option value="topdown"<?php selected($instance['mask_imgs_dir'], 'topdown'); ?>><?php _e('Top Down', 'rokstories'); ?></option>
			      		<option value="bottomup"<?php selected($instance['mask_imgs_dir'], 'bottomup'); ?>><?php _e('Bottom Up', 'rokstories'); ?></option>
			      		<option value="fade"<?php selected($instance['mask_imgs_dir'], 'fade'); ?>><?php _e('Fade', 'rokstories'); ?></option>
			        </select>
				</div>
				
				<div class="param">
					<label class="desc" for="<?php echo $this->get_field_id('scrollerDuration'); ?>">
			        	<?php _e('Scroller Duration (ms)', 'rokstories'); ?>
			        </label>
			    	<input class="smallinputbox" id="<?php echo $this->get_field_id('scrollerDuration'); ?>" name="<?php echo $this->get_field_name('scrollerDuration'); ?>" type="text" value="<?php echo $instance['scrollerDuration']; ?>" />
				</div>
				
				<div class="param">
					<label class="desc" for="<?php echo $this->get_field_id('scrollerTransition'); ?>">
						<?php _e('Transition Effect', 'rokstories'); ?>
					</label>
			    	<select id="<?php echo $this->get_field_id('scrollerTransition'); ?>" name="<?php echo $this->get_field_name('scrollerTransition'); ?>">
			      		<option value="linear"<?php selected( $instance['scrollerTransition'], 'linear' ); ?>>linear</option>
			      		<option value="Quad.easeOut"<?php selected( $instance['scrollerTransition'], 'Quad.easeOut' ); ?>>Quad.easeOut</option>
			      		<option value="Quad.easeIn"<?php selected( $instance['scrollerTransition'], 'Quad.easeIn' ); ?>>Quad.easeIn</option>
			      		<option value="Quad.easeInOut"<?php selected( $instance['scrollerTransition'], 'Quad.easeInOut' ); ?>>Quad.easeInOut</option>
			      		<option value="Cubic.easeOut"<?php selected( $instance['scrollerTransition'], 'Cubic.easeOut' ); ?>>Cubic.easeOut</option>
			      		<option value="Cubic.easeIn"<?php selected( $instance['scrollerTransition'], 'Cubic.easeIn' ); ?>>Cubic.easeIn</option>
			      		<option value="Cubic.easeInOut"<?php selected( $instance['scrollerTransition'], 'Cubic.easeInOut' ); ?>>Cubic.easeInOut</option>
			      		<option value="Quart.easeOut"<?php selected( $instance['scrollerTransition'], 'Quart.easeOut' ); ?>>Quart.easeOut</option>
			      		<option value="Quart.easeIn"<?php selected( $instance['scrollerTransition'], 'Quart.easeIn' ); ?>>Quart.easeIn</option>
			      		<option value="Quart.easeInOut"<?php selected( $instance['scrollerTransition'], 'Quart.easeInOut' ); ?>>Quart.easeInOut</option>
			      		<option value="Quint.easeOut"<?php selected( $instance['scrollerTransition'], 'Quint.easeOut' ); ?>>Quint.easeOut</option>
			      		<option value="Quint.easeIn"<?php selected( $instance['scrollerTransition'], 'Quint.easeIn' ); ?>>Quint.easeIn</option>
			      		<option value="Quint.easeInOut"<?php selected( $instance['scrollerTransition'], 'Quint.easeInOut' ); ?>>Quint.easeInOut</option>
			      		<option value="Expo.easeOut"<?php selected( $instance['scrollerTransition'], 'Expo.easeOut' ); ?>>Expo.easeOut</option>
			      		<option value="Expo.easeIn"<?php selected( $instance['scrollerTransition'], 'Expo.easeIn' ); ?>>Expo.easeIn</option>
			      		<option value="Expo.easeInOut"<?php selected( $instance['scrollerTransition'], 'Expo.easeInOut' ); ?>>Expo.easeInOut</option>
			      		<option value="Circ.easeOut"<?php selected( $instance['scrollerTransition'], 'Circ.easeOut' ); ?>>Circ.easeOut</option>
			      		<option value="Circ.easeIn"<?php selected( $instance['scrollerTransition'], 'Circ.easeIn' ); ?>>Circ.easeIn</option>
			      		<option value="Circ.easeInOut"<?php selected( $instance['scrollerTransition'], 'Circ.easeInOut' ); ?>>Circ.easeInOut</option>
			      		<option value="Sine.easeOut"<?php selected( $instance['scrollerTransition'], 'Sine.easeOut' ); ?>>Sine.easeOut</option>
			      		<option value="Sine.easeIn"<?php selected( $instance['scrollerTransition'], 'Sine.easeIn' ); ?>>Sine.easeIn</option>
			      		<option value="Sine.easeInOut"<?php selected( $instance['scrollerTransition'], 'Sine.easeInOut' ); ?>>Sine.easeInOut</option>
			      		<option value="Back.easeOut"<?php selected( $instance['scrollerTransition'], 'Back.easeOut' ); ?>>Back.easeOut</option>
			      		<option value="Back.easeIn"<?php selected( $instance['scrollerTransition'], 'Back.easeIn' ); ?>>Back.easeIn</option>
			      		<option value="Back.easeInOut"<?php selected( $instance['scrollerTransition'], 'Back.easeInOut' ); ?>>Back.easeInOut</option>
			      		<option value="Bounce.easeOut"<?php selected( $instance['scrollerTransition'], 'Bounce.easeOut' ); ?>>Bounce.easeOut</option>
			      		<option value="Bounce.easeIn"<?php selected( $instance['scrollerTransition'], 'Bounce.easeIn' ); ?>>Bounce.easeIn</option>
			      		<option value="Bounce.easeInOut"<?php selected( $instance['scrollerTransition'], 'Bounce.easeInOut' ); ?>>Bounce.easeInOut</option>
			      		<option value="Elastic.easeOut"<?php selected( $instance['scrollerTransition'], 'Elastic.easeOut' ); ?>>Elastic.easeOut</option>
			      		<option value="Elastic.easeIn"<?php selected( $instance['scrollerTransition'], 'Elastic.easeIn' ); ?>>Elastic.easeIn</option>
			      		<option value="Elastic.easeInOut"<?php selected( $instance['scrollerTransition'], 'Elastic.easeInOut' ); ?>>Elastic.easeInOut</option>
			        </select>
				</div>
				
				<div class="param">
			    	<label class="desc" for="<?php echo $this->get_field_id('show_controls'); ?>">
			    		<?php _e('Show Controls', 'rokstories'); ?>
			    	</label>
					<input id="<?php echo $this->get_field_id('show_controls'); ?>0" type="radio" value="0" name="<?php echo $this->get_field_name('show_controls'); ?>" <?php if($instance['show_controls'] == '0') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('show_controls'); ?>0"><?php _e('No', 'rokstories'); ?></label>&nbsp;&nbsp;
					<input id="<?php echo $this->get_field_id('show_controls'); ?>1" type="radio" value="1" name="<?php echo $this->get_field_name('show_controls'); ?>" <?php if($instance['show_controls'] == '1') echo 'checked="checked"'; ?>/>
					<label for="<?php echo $this->get_field_id('show_controls'); ?>1"><?php _e('Yes', 'rokstories'); ?></label>
				</div>
				
				<hr class="splitter" />
				
				<div class="param">
					<label class="desc" for="<?php echo $this->get_field_id('left_offset_x'); ?>">
			        	<?php _e('Left Preview Offset X', 'rokstories'); ?>
			        </label>
			    	<input class="smallinputbox" id="<?php echo $this->get_field_id('left_offset_x'); ?>" name="<?php echo $this->get_field_name('left_offset_x'); ?>" type="text" value="<?php echo $instance['left_offset_x']; ?>" />
				</div>
				
				<div class="param">
					<label class="desc" for="<?php echo $this->get_field_id('left_offset_y'); ?>">
			        	<?php _e('Left Preview Offset Y', 'rokstories'); ?>
			        </label>
			    	<input class="smallinputbox" id="<?php echo $this->get_field_id('left_offset_y'); ?>" name="<?php echo $this->get_field_name('left_offset_y'); ?>" type="text" value="<?php echo $instance['left_offset_y']; ?>" />
				</div>
				
				<div class="param">
					<label class="desc" for="<?php echo $this->get_field_id('right_offset_x'); ?>">
			        	<?php _e('Right Preview Offset X', 'rokstories'); ?>
			        </label>
			    	<input class="smallinputbox" id="<?php echo $this->get_field_id('right_offset_x'); ?>" name="<?php echo $this->get_field_name('right_offset_x'); ?>" type="text" value="<?php echo $instance['right_offset_x']; ?>" />
				</div>
				
				<div class="param">
					<label class="desc" for="<?php echo $this->get_field_id('right_offset_y'); ?>">
			        	<?php _e('Right Preview Offset Y', 'rokstories'); ?>
			        </label>
			    	<input class="smallinputbox" id="<?php echo $this->get_field_id('right_offset_y'); ?>" name="<?php echo $this->get_field_name('right_offset_y'); ?>" type="text" value="<?php echo $instance['right_offset_y']; ?>" />
				</div>
				
				<div class="param">
					<label class="desc" for="<?php echo $this->get_field_id('left_f_offset_x'); ?>">
			        	<?php _e('Left Fixed Preview Offset X', 'rokstories'); ?>
			        </label>
			    	<input class="smallinputbox" id="<?php echo $this->get_field_id('left_f_offset_x'); ?>" name="<?php echo $this->get_field_name('left_f_offset_x'); ?>" type="text" value="<?php echo $instance['left_f_offset_x']; ?>" />
				</div>
				
				<div class="param">
					<label class="desc" for="<?php echo $this->get_field_id('left_f_offset_y'); ?>">
			        	<?php _e('Left Fixed Preview Offset Y', 'rokstories'); ?>
			        </label>
			    	<input class="smallinputbox" id="<?php echo $this->get_field_id('left_f_offset_y'); ?>" name="<?php echo $this->get_field_name('left_f_offset_y'); ?>" type="text" value="<?php echo $instance['left_f_offset_y']; ?>" />
				</div>
				
				<div class="param">
					<label class="desc" for="<?php echo $this->get_field_id('right_f_offset_x'); ?>">
			        	<?php _e('Right Fixed Preview Offset X', 'rokstories'); ?>
			        </label>
			    	<input class="smallinputbox" id="<?php echo $this->get_field_id('right_f_offset_x'); ?>" name="<?php echo $this->get_field_name('right_f_offset_x'); ?>" type="text" value="<?php echo $instance['right_f_offset_x']; ?>" />
				</div>
				
				<div class="param">
					<label class="desc" for="<?php echo $this->get_field_id('right_f_offset_y'); ?>">
			        	<?php _e('Right Fixed Preview Offset Y', 'rokstories'); ?>
			        </label>
			    	<input class="smallinputbox" id="<?php echo $this->get_field_id('right_f_offset_y'); ?>" name="<?php echo $this->get_field_name('right_f_offset_y'); ?>" type="text" value="<?php echo $instance['right_f_offset_y']; ?>" />
				</div>
			</div>
			<div class="clear"></div>
			<div class="rokstories-diag">
				<?php	
					if (extension_loaded('gd') && function_exists('gd_info')) {
			    		echo '<div class="approved">'.__('GD2 Library Present: ', 'rokstories').__('YES', 'rokstories').'</div>';
					} else {
						echo '<div class="alert">'.__('GD2 Library Present: ', 'rokstories').__('NO', 'rokstories').'</div>';
					}

					if (is_writeable($rokstories_plugin_path . DS .'cache')) {
			    		echo '<div class="approved">'.__('Cache Directory Writeable: ', 'rokstories').__('YES', 'rokstories').'</div>';
					} else {
						echo '<div class="alert">'.__('Cache Directory Writeable: ', 'rokstories').__('NO', 'rokstories').'</div>';
					}
				?>
			</div>
		</div>
		
		<!-- End RokStories Widget Admin -->
	
		<?php
	
        echo ob_get_clean();
    }
    
    function prepareContent($text, $instance) {
		$tags_option = $instance['strip_tags'];
		
		$tags = explode(",", $tags_option);
		$strip_tags = array();
		for($i = 0; $i < count($tags); $i++) {
			$strip_tags[$i] = '<'.trim($tags[$i]).'>';
		}
		$tags = implode(',', $strip_tags);
		
		// strips tags won't remove the actual jscript
		$text = preg_replace( "'<script[^>]*>.*?</script>'si", "", $text );
		
		$text = preg_replace( '/{.+?}/', '', $text);
		$text = strip_tags($text, $tags);

		return $text;
	}

	function get_first_image() {
		global $post, $posts;
		$first_img = '';
		ob_start();
		ob_end_clean();
		$output = preg_match_all("/\<img.+?src=\"(.+?)\".+?\/>/", $post->post_content, $matches);
		$first_img = $matches[1][0];
		return $first_img;
	}

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
	* $image = rokstories_resize( $thumb, '', 140, 110, true );
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
	 
	function rokstories_resize( $attach_id = null, $img_url = null, $width, $height, $crop = false ) {
	
		global $rokstories_plugin_path, $rokstories_plugin_url;
	
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
		$no_ext_path = $rokstories_plugin_path. DS .'cache'. DS .$file_info['filename'];
	
		$cropped_img_path = $no_ext_path.'-'.$width.'x'.$height.$extension;
	
		// checking if the file size is larger than the target size
		// if it is smaller or the same size, stop right here and return
		if ( $image_src[1] > $width || $image_src[2] > $height ) {
	
			// the file is larger, check if the resized version already exists (for $crop = true but will also work for $crop = false if the sizes match)
			if ( file_exists( $cropped_img_path ) ) {
	
				$default_url = str_replace(basename($image_src[0]), basename($cropped_img_path), $image_src[0]);
				$cropped_img_url = str_replace(dirname($image_src[0]), $rokstories_plugin_url.'/cache', $default_url);
				
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
					$resized_img_url = str_replace(dirname($image_src[0]), $rokstories_plugin_url.'/cache', $default_url);
	
					$vt_image = array (
						'url' => $resized_img_url,
						'width' => $proportional_size[0],
						'height' => $proportional_size[1]
					);
					
					return $vt_image;
				}
			}
	
			// no cache files - let's finally resize it
			$new_img_path = image_resize( $file_path, $width, $height, $crop, '', $rokstories_plugin_path.'/cache' );
			$new_img_size = getimagesize( $new_img_path );
			$default_url = str_replace( basename( $image_src[0] ), basename( $new_img_path ), $image_src[0] );
			$new_img = str_replace(dirname($image_src[0]), $rokstories_plugin_url.'/cache', $default_url);
	
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
    
    /********** Bellow here should not need to be changed ***********/

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

RokStories::$plugin_path = dirname($plugin);
RokStories::$plugin_url = WP_PLUGIN_URL. '/' .basename(RokStories::$plugin_path);

add_action('widgets_init', array('RokStories', 'init'));
add_action('wp_print_styles', array('RokStories', 'rokstories_scripts'));
add_action('wp_head', array('RokStories', 'rokstories_head'));
add_action('admin_print_styles', array('RokStories', 'rokstories_admin_style'));

// Add RokStories meta box

function rokstories_add_custom_box() {
     add_meta_box('rokstories_box', 'RokStories', 'rokstories_custom_box', 'post', 'normal', 'high');
     add_meta_box('rokstories_box', 'RokStories', 'rokstories_custom_box', 'page', 'normal', 'high');
}

function rokstories_custom_box() {
	global $post;
	$image = get_post_meta($post->ID,'_rokstories_image',true);	
	echo '<input type="hidden" name="rokstories_noncename" id="rokstories_noncename" value="'.wp_create_nonce('rt_rokstories').'" />';
	echo '<p>'.__('Please use links only to images that are located on the same server as your WordPress site. If automatic thumbnails aren\'t working for you please check if the <b>cache</b> directory inside of the RokStories plugin dir has proper permissions.', 'rokstories').'<br /><br />';
	echo '<label for="rt_image_box">'.__('Image Path:', 'rokstories').'</label> ';
	echo '<input type="text" class="code" value="'.$image.'" id="rt_image_box" name="rt_image_box" style="width:99%;" /></p>';
}

function rokstories_save_data($post_id) {
     // verify this with nonce because save_post can be triggered at other times
     if (!wp_verify_nonce($_POST['rokstories_noncename'], 'rt_rokstories')) return $post_id;
     
     // do not save if this is an auto save routine
     if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;

     $rt_image_box = trim($_POST['rt_image_box']);
     if($rt_image_box != '') :
    	 update_post_meta($post_id, '_rokstories_image', $rt_image_box);
	 else:
	 	 delete_post_meta($post_id, '_rokstories_image');
	 endif;
}

add_action('admin_menu', 'rokstories_add_custom_box');
add_action('save_post', 'rokstories_save_data');

// Load Language

load_plugin_textdomain('rokstories', false, basename($rokstories_plugin_path). DS .'languages'. DS);

// MooTools Enqueue Script

add_action('init', 'rokstories_mootools_init', -50);

function rokstories_mootools_init(){
	global $rokstories_plugin_url;
    wp_register_script('mootools.js', $rokstories_plugin_url.'/tmpl/js/mootools.js');
	wp_enqueue_script('mootools.js');
}


?>