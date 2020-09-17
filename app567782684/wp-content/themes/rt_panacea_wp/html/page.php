<?php
/**
 * @version   1.2 August 21, 2011
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2011 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

// no direct access
?>

<?php global $post, $posts, $query_string; ?>

	<div class="rt-wordpress">
		<div class="rt-page">
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
			<!-- Begin Post -->
			
			<div class="rt-article">					
								
				<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
					
					<?php if($gantry->get('page-title')) : ?>
	
					<!-- Begin Title -->
				
					<div class="module-title-surround">
						<div class="module-title">
										
							<h1 class="title">
								<?php the_title(); ?>
							</h1>
								
						</div>
					</div>
						
					<!-- End Title -->
						
					<?php endif; ?>						
				
					<?php if($gantry->get('page-meta-comments') || $gantry->get('page-meta-date') || $gantry->get('page-meta-modified') || $gantry->get('page-meta-author')) : ?>
							
					<!-- Begin Meta -->
					
					<div class="rt-articleinfo">
						<div class="rt-articleinfo-text">
					
							<?php if($gantry->get('page-meta-date')) : ?>
							
							<!-- Begin Date & Time -->
		
							<span class="rt-date-posted"><!--<?php _re('Posted on'); ?> --> <?php the_time('l, d F Y H:i'); ?></span>
							
							<!-- End Date & Time -->
							
							<?php endif; ?>
							
							<?php if($gantry->get('page-meta-modified')) : ?>
							
							<!-- Begin Modified Date -->
		
							<span class="rt-date-modified"><?php _re('Last Updated on'); ?> <?php the_modified_date('l, d F Y H:i'); ?></span>
							
							<!-- End Modified Date -->
							
							<?php endif; ?>
								
							<?php if($gantry->get('page-meta-author')) : ?>
						
							<!-- Begin Author -->
						
							<span class="rt-author"><?php _re('Written by'); ?> <?php the_author(); ?></span>
							
							<!-- End Author -->
							
							<?php endif; ?>
							
							<?php if($gantry->get('page-meta-comments')) : ?>
								
							<!-- Begin Comments -->
							
							<span class="rt-comment-text"><?php comments_number(_r('0 Comments'), _r('1 Comment'), _r('% Comments')); ?></span>
							
							<!-- End Comments -->
						
							<?php endif; ?>
						
						</div>							
					</div>
					
					<!-- End Meta -->
					
					<?php endif; ?>
					
					<div class="module-content">
				
						<!-- Begin Post Content -->	
	
						<?php the_content(); ?>
	
						<div class="clear"></div>
						
						<?php wp_link_pages('before=<div class="rt-pagination">'._r('Pages:').'&after=</div><br />'); ?>
																													
						<?php edit_post_link(_r('Edit this entry.'), '<div class="edit-entry">', '</div>'); ?>
							
						<?php if(comments_open() && $gantry->get('page-comments-form')) : ?>
																	
							<?php echo $gantry->displayComments(true, $gantry->get('comments-style'), $gantry->get('comments-style')); ?>
						
						<?php endif; ?>
						
						<div class="clear"></div>
						
						<!-- End Post Content -->

					</div>
											
				</div>				
			</div>
			
			<!-- End Post -->
			
			<?php endwhile;?>
			
			<?php else : ?>
																		
			<h1 class="title">
				<?php _re('Sorry, no pages matched your criteria.'); ?>
			</h1>
				
			<?php endif; ?>
			
			<?php wp_reset_query(); ?>

		</div>
	</div>