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

class GantryWidgetRotator extends GantryWidget {
    var $short_name = 'rotator';
    var $wp_name = 'gantry_rotator';
    var $long_name = 'Gantry Rotator';
    var $description = 'Gantry Background Rotator Widget';
    var $css_classname = 'widget_gantry_rotator';
    var $width = 200;
    var $height = 400;

    function init() {
        global $gantry;
        
        register_widget("GantryWidgetRotator");
		
		if ($gantry->get('rotator-enabled')) {
			$path = $gantry->_working_params['rotator-backgrounds']['attributes']['path'];
	        $path = str_replace("__TEMPLATE__", $gantry->templateUrl, $path);
			$bgs = implode("', '", explode(',', $gantry->get('rotator-backgrounds')));
			$gantry->addScript('gantry-rotator.js');
			$gantry->addInlineScript("
				var GantryRotatorList = {'backgrounds': ['".$bgs."'], 'path': '".$path."'};
				window.addEvent('domready', function() {
					var GantryRotatorFx = new GantryRotator('rt-rotator', {
						'controls': ".$gantry->get('rotator-controls').",
						'autoplay': ".$gantry->get('rotator-autoplay').",
						'delay': ".$gantry->get('rotator-delay').",
						'interval': ".$gantry->get('rotator-interval')."
					});
				});
			");			
		}
        
    }

	function render_widget_open($args, $instance){
    }
    
    function render_widget_close($args, $instance){
    }
    
    function pre_render($args, $instance) {
    }
    
    function post_render($args, $instance) {
    }

    function render($args, $instance){
        global $gantry, $post;
		
        ob_start();
		
		$category = $instance['category'];
		$catid = get_term_by('slug', $category, 'category');
		$content = get_posts('cat='.$catid->term_id);
		$order = $instance['orderby'];
		
		?>
		
		<div id="<?php echo $this->id; ?>" class="widget <?php echo $this->css_classname; ?> rt-block">
		
			<?php
			
			if($content) {
				$i = 0;
		
				$rotator = new WP_Query('cat='.$catid->term_id.'&posts_per_page=-1&orderby='.$order);
				if($rotator->have_posts()) : while($rotator->have_posts()) : $rotator->the_post();
				
				$more = 0;
				if (!$i) $cls = " first";
				else if ($i == count($content) - 1) $cls = " last";
				else $cls = "";
			    ?>
			    		    
				<div class="rotator-desc<?php echo $cls; ?>">
					<?php the_content(false); ?>
				</div>    
			    
			    <?php
			    $i++;
			    endwhile; endif;
			} else {
				_re('Sorry, but your category is empty!');
			}
			
			?>
		
		</div>
		
		<?php
	    
	    echo ob_get_clean();
	}
}
