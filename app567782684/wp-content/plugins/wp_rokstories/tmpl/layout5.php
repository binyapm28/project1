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
?>

<div id="rokstories-<?php echo $widget_id; ?>" class="rokstories-<?php echo $layout; ?>" <?php echo $style; ?>>
	<div class="feature-block">
		<div class="image-container<?php echo $image_pad; ?>" style="float: <?php echo $content_position; ?>">
			<div class="image-full"></div>
			<?php if($instance['show_mask'] == '1') : ?>
			<div class="image-mask"></div>
			<?php endif;?>
			<div class="image-small">
			    <?php if($rokstories->have_posts()) : while($rokstories->have_posts()) : $rokstories->the_post();
			    
			    	$image = get_post_meta($post->ID, '_rokstories_image', true);
					$first_image = $this->get_first_image();
				
					if($instance['thumb_generator'] == 'timthumb') :
						if($instance['catch_first_image'] == '1' && !empty($first_image)) : ?>
							<img src="<?php echo $rokstories_plugin_url.'/thumb.php?src='.$first_image.'&amp;w='.$instance['thumb_width'].'&amp;h='.$instance['thumb_height'].'&amp;zc=1&amp;q=75'; ?>" class="feature-sub" alt="image" width="<?php echo $instance['thumb_width']; ?>" height="<?php echo $instance['thumb_height']; ?>" />
						<?php else : ?>
							<img src="<?php echo $rokstories_plugin_url.'/thumb.php?src='.$image.'&amp;w='.$instance['thumb_width'].'&amp;h='.$instance['thumb_height'].'&amp;zc=1&amp;q=75'; ?>" class="feature-sub" alt="image" width="<?php echo $instance['thumb_width']; ?>" height="<?php echo $instance['thumb_height']; ?>" />
						<?php endif; 
					else :
						if($instance['catch_first_image'] == '1' && !empty($first_image)) :
							$vt_img = $this->rokstories_resize('', $first_image, $instance['thumb_width'], $instance['thumb_height'], true); ?>
							<img src="<?php echo $vt_img['url']; ?>" class="feature-sub" alt="image" width="<?php echo $instance['thumb_width']; ?>" height="<?php echo $instance['thumb_height']; ?>" />
						<?php else :
							$vt_img = $this->rokstories_resize('', $image, $instance['thumb_width'], $instance['thumb_height'], true); ?>
							<img src="<?php echo $vt_img['url']; ?>" class="feature-sub" alt="image" width="<?php echo $instance['thumb_width']; ?>" height="<?php echo $instance['thumb_height']; ?>" />
						<?php endif; 
					endif; ?>
				<?php endwhile; endif; ?>
			</div>
				<div class="feature-block-tl"></div>
				<div class="feature-block-tr"></div>
				<div class="feature-block-bl"></div>
				<div class="feature-block-br"></div>
				<?php if($instance['show_arrows'] == '1' && $instance['arrows_placement'] == 'inside') : ?>
				<div class="feature-arrow-r"></div>
				<div class="feature-arrow-l"></div>
				<?php endif; ?>
				
				<?php if($instance['show_label_article_title'] == '1') : ?>
				<div class="labels-title">
					<?php if($rokstories->have_posts()) : while($rokstories->have_posts()) : $rokstories->the_post(); ?>
						<?php if($instance['show_label_article_title'] == '1') : ?>
						<div class="feature-block-title">
							<div class="feature-block-title2"></div>
							<div class="feature-block-title3">
								<?php if($instance['link_labels'] == '1') : ?>
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								<?php else: ?>
									<?php the_title(); ?>
								<?php endif; ?>
							</div>
						</div>
						<?php endif;?>
					<?php endwhile; endif; ?>
				</div>
				<?php endif; ?>
		</div>
		<div class="desc-container">
			<?php if($rokstories->have_posts()) : while($rokstories->have_posts()) : $rokstories->the_post(); 
				$more = 0;
			?>	        
			<div class="description<?php echo $content_pad; ?>">
				<?php if($instance['show_article_title'] == '1') : ?>
					<?php if ($instance['link_titles'] == '1') : ?>
						<a href="<?php the_permalink(); ?>" class="feature-link"><span class="feature-title"><?php the_title(); ?></span></a>
					<?php else: ?>
						<span class="feature-title"><?php the_title(); ?></span>					
					<?php endif; ?>
				<?php endif;?>
				<?php if($instance['show_created_date'] == '1') : ?>
				    <span class="created-date"><?php the_time('l, j F o'); ?></span>
				<?php endif;?>
				<?php if($instance['show_author'] == '1') : ?>
				    <span class="post-author"><?php _e('Written by', 'rokstories'); ?> <?php the_author(); ?></span>
				<?php endif;?>
			
				<?php if($instance['show_article'] == '1') : ?>
					<?php if($instance['article_content'] == 'excerpt') : ?>
						<div class="feature-desc"><?php echo $this->prepareContent(get_the_excerpt(), $instance); ?></div>
					<?php else : ?>
						<div class="feature-desc"><?php echo $this->prepareContent(get_the_content(false), $instance); ?></div>
					<?php endif; ?>
				<?php endif; ?>
		    
				<?php if($instance['show_article_link'] == '1') : ?>
					<?php if($instance['legacy_readmore'] == '1') : ?>
						<div class="clr"></div><div class="readon-wrap1"><div class="readon1-l"></div><a href="<?php the_permalink(); ?>" class="readon-main"><span class="readon1-m"><span class="readon1-r"><?php echo $instance['readmore_label']; ?></span></span></a></div><div class="clr"></div>
					<?php endif;?>
					<?php if($instance['legacy_readmore'] == '0') : ?>
						<a href="<?php the_permalink(); ?>" class="readon"><span><?php echo $instance['readmore_label']; ?></span></a>
					<?php endif; ?>
				<?php endif; ?>
			</div>
	        <?php endwhile; endif; ?>
		</div>
		<?php if($instance['show_arrows'] == '1' && $layout == 'layout5') {
			echo "<div class='vertical-list-wrapper'><ul class='vertical-list'>";
			echo "<li class='previous'><span class='feature-arrow-l'></span></li>";
			$i = 0; if($rokstories->have_posts()) : while($rokstories->have_posts()) : $rokstories->the_post();
				if ($i == $instance['start_element']) $class = ' active';
				else $class = '';
				echo "<li class='feature-number-sub listitem-".($i+1).$class."'><span>".($i+1)."</span></li>";
				$i++;
			endwhile; endif;
			echo "<li class='next'><span class='feature-arrow-r'></span></li>";
			echo "</ul></div>";
		} ?>
	</div>
</div>