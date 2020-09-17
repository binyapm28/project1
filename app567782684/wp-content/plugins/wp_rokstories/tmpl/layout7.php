<?php 
/**
 * @version   1.21 August 15, 2011
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2011 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

$layout = $instance['layout_type'];
$content_position = $instance['content_position'];
$height = $instance['fixed_height'];
if ($height != 0 && $height != '0') $style = 'style="height: '.$height.'px;"';
else $style = "";
$image_pad = '';
$content_pad = '';
if ($content_position == 'right') $image_pad = ' feature-pad';
if ($content_position == 'left') $content_pad = ' feature-pad';

if ($content_position == 'right') $content_right = ' content-left';
else $content_right = ' content-right';

$show_titles = $instance['show_article_title'];
$link_titles = $instance['link_titles'];

$count = 0;
?>

<div id="rokstories-<?php echo $widget_id; ?>" class="rokstories-<?php echo $layout; ?><?php echo $content_right; ?> rt-gallery-container"  <?php echo $style; ?>>
	<div class="rt-gallery-overlay">
		<div class="rt-gallery-overlay2"></div>
		<div class="rt-gallery-overlay3"></div>
		<div class="rt-gallery-overlay4"></div>
	</div>
	<div class="rt-gallery">
		<ul class="rt-gallery-items">
			<?php if($rokstories->have_posts()) : while($rokstories->have_posts()) : $rokstories->the_post(); ?>
				<?php 
					$count++;
					if ($count == 1) $active = ' class="active"';
					else $active = ''; 
				?>
				<li<?php echo $active;?>>
					
					<?php $image = get_post_meta($post->ID, '_rokstories_image', true);
					$first_image = $this->get_first_image();
				
					if($instance['thumb_generator'] == 'timthumb') :
						if($instance['catch_first_image'] == '1' && !empty($first_image)) : ?>
							<img src="<?php echo $rokstories_plugin_url.'/thumb.php?src='.$first_image.'&amp;w='.$instance['img_width'].'&amp;h='.$instance['img_height'].'&amp;zc=1&amp;q=75'; ?>" alt="<?php the_permalink(); ?>" />
						<?php else : ?>
							<img src="<?php echo $rokstories_plugin_url.'/thumb.php?src='.$image.'&amp;w='.$instance['img_width'].'&amp;h='.$instance['img_height'].'&amp;zc=1&amp;q=75'; ?>" alt="<?php the_permalink(); ?>" />
						<?php endif; 
					else :
						if($instance['catch_first_image'] == '1' && !empty($first_image)) :
							$vt_img = $this->rokstories_resize('', $first_image, $instance['img_width'], $instance['img_height'], true); ?>
							<img src="<?php echo $vt_img['url']; ?>" alt="<?php the_permalink(); ?>" />
						<?php else :
							$vt_img = $this->rokstories_resize('', $image, $instance['img_width'], $instance['img_height'], true); ?>
							<img src="<?php echo $vt_img['url']; ?>" alt="<?php the_permalink(); ?>" />
						<?php endif; 
					endif; ?>
				</li>
			<?php endwhile; endif; ?>
		</ul>
	</div>
	
	<?php if ($count > 0): ?>
	<div class="rt-gallery-controls-container"><div class="rt-gallery-controls"><div class="rt-gallery-controls2"><div class="rt-gallery-controls3">
		<?php if ($show_titles): ?>
		<div class="rt-gallery-title">
			<?php
				$count = 0;
				if($rokstories->have_posts()) : while($rokstories->have_posts()) : $rokstories->the_post();
					$cls = ' class="layout7-title layout7-title-'.($count + 1).'"';
					
					if ($link_titles) echo "<a href='".get_permalink()."'".$cls."><span>".get_the_title()."</span></a>";
					else echo "<span".$cls.">".get_the_title()."</span>";
					$count++;
				endwhile; endif;
			?>	
		</div>
		<?php endif; ?>
		<ul>
			<li class="arrow previous"></li>
			<?php for ($i = 1; $i <= $count; $i++): ?>
				<?php 
					if ($i == 1) $active = ' class="active"';
					else $active = ''; 
				?>
				<li<?php echo $active;?>></li>
			<?php endfor;?>
			<li class="arrow next"></li>
		</ul>
	</div></div></div></div>
	<?php endif; ?>	
</div>