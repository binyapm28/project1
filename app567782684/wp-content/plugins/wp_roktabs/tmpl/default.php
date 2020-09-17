		<?php if (get_posts('cat='.$catid->term_id)) { ?>
		
  		<script type="text/javascript">
  			RokTabsOptions.mouseevent.push('<?php echo $roktabs_mouse; ?>');
			RokTabsOptions.duration.push(<?php echo $roktabs_duration; ?>);
			RokTabsOptions.transition.push(Fx.Transitions.<?php echo $roktabs_effect; ?>);
			RokTabsOptions.auto.push(<?php echo $roktabs_autoplay; ?>);
			RokTabsOptions.delay.push(<?php echo $roktabs_autoplay_delay; ?>);
			RokTabsOptions.type.push('<?php echo $roktabs_transition_type; ?>');
			RokTabsOptions.linksMargins.push(<?php echo $roktabs_link_margin; ?>);
		</script>
		<div class="roktabs-wrapper" style="width: <?php echo $roktabs_width; ?>px;">
			<div class="roktabs base<?php echo $theme; ?>">
			
				<?php if($roktabs_pos == 'top' || $roktabs_pos == 'hidden') { ?>
			
				<div class='roktabs-links tabs-top'<?php if ($roktabs_pos == 'hidden') echo ' style="display: none;"'; ?>>
					<!--<div class="roktabs-arrows">
						<span class="previous">&larr;</span>
						<span class="next">&rarr;</span>
					</div>-->
					<ul class='roktabs-top'>
					
						<?php $i = 1; ?>
						
						<?php $roktabs = new WP_Query('cat='.$catid->term_id.'&posts_per_page='.$roktabs_tabs_count.'&orderby='.$roktabs_order);
						if($roktabs->have_posts()) : while($roktabs->have_posts()) : $roktabs->the_post(); ?>
						
						<?php
							
							$chosenicon = get_post_meta($post->ID, '_roktabs_icon', true);	
							$title = get_the_title();
							$class = '';

							if($roktabs_show_icon == '1') {								
								$icon = '';
								if ($iconpath_exists && $chosenicon != '__none__' && $chosenicon != '') {
									$thisiconpath = $icon_url_local.$chosenicon;
									if (file_exists($thisiconpath)) {
										$thisiconuri = $icon_url_remote.$chosenicon;
										$icon = '<img src="'.$thisiconuri.'" class="tab-icon" alt="'.$title.'" />';
									}
								}
								
								// set icons on the correct side
								if ($roktabs_icon_side == 'left') {
									$title = $icon.$title;
									$class = ' icon-left';
								} else {
									$title = $title.$icon;
									$class = ' icon-right';
								}
							}
							
						?>
						
						<?php if($i == 1) { $tabs_order = 'first active'; } elseif ($i == $roktabs_tabs_count) { $tabs_order = 'last'; } else { $tabs_order = ''; } ?>
						
						<li class="<?php echo $tabs_order . $class; ?>"><span><?php echo $title; ?></span></li>
						
						<?php $i++; ?>
		                <?php endwhile; endif; ?>
		                
					</ul>
				</div>
				
				<?php } ?>
				
				<div class="roktabs-container-tr">
					<div class="roktabs-container-tl">
						<div class="roktabs-container-br">
							<div class="roktabs-container-bl">
								<div class="roktabs-container-inner">
									<div class="roktabs-container-wrapper">
									
										<?php $i = 1; ?>	
										
										<?php $roktabs = new WP_Query('cat='.$catid->term_id.'&posts_per_page='.$roktabs_tabs_count.'&orderby='.$roktabs_order);
										if($roktabs->have_posts()) : while($roktabs->have_posts()) : $roktabs->the_post(); ?>
										
										<?php $more = 0; ?>		
																							
										<!-- Begin Tab <?php echo $i; ?> -->
																							
										<div class='roktabs-tab<?php echo $i; ?>'>
											<div class='wrapper'>
												
												<?php if ($roktabs_content == 'content') { ?>
												
												<?php the_content(__('(more ...)', 'roktabs')); ?>
												
												<?php } else { ?>
												
												<?php the_excerpt(); ?>
												<a href="<?php the_permalink(); ?>"><?php _e('(more ...)', 'roktabs'); ?></a>
												
												<?php } ?>
												
											</div>
										</div>
																								
										<!-- End Tab <?php echo $i; ?> -->
										
										<?php $i++; ?>
		                				<?php endwhile; endif; ?>
										
									</div>
								</div>
							</div>
						</div>
					</div>	
				</div>
				
				<?php if($roktabs_pos == 'bottom') { ?>
			
				<div class='roktabs-links tabs-bottom'>
					<!--<div class="roktabs-arrows">
						<span class="previous">&larr;</span>
						<span class="next">&rarr;</span>
					</div>-->
					<ul class='roktabs-bottom'>
					
						<?php $i = 1; ?>
						
						<?php $roktabs = new WP_Query('cat='.$catid->term_id.'&posts_per_page='.$roktabs_tabs_count.'&orderby='.$roktabs_order);
						if($roktabs->have_posts()) : while($roktabs->have_posts()) : $roktabs->the_post(); ?>
						
						<?php
							
							$chosenicon = get_post_meta($post->ID, '_roktabs_icon', true);	
							$title = get_the_title();
							$class = '';

							if($roktabs_show_icon == '1') {								
								$icon = '';
								if ($iconpath_exists && $chosenicon != '__none__' && $chosenicon != '') {
									$thisiconpath = $icon_url_local.$chosenicon;
									if (file_exists($thisiconpath)) {
										$thisiconuri = $icon_url_remote.$chosenicon;
										$icon = '<img src="'.$thisiconuri.'" class="tab-icon" alt="'.$title.'" />';
									}
								}
								
								// set icons on the correct side
								if ($roktabs_icon_side == 'left') {
									$title = $icon.$title;
									$class = ' icon-left';
								} else {
									$title = $title.$icon;
									$class = ' icon-right';
								}
							}
							
						?>
						
						<?php if($i == 1) { $tabs_order = 'first active'; } elseif ($i == $roktabs_tabs_count) { $tabs_order = 'last'; } else { $tabs_order = ''; } ?>
						
						<li class="<?php echo $tabs_order . $class; ?>"><span><?php echo $title; ?></span></li>
						
						<?php $i++; ?>
		                <?php endwhile; endif; ?>
		                
					</ul>
				</div>
				
				<?php } ?>
				
			</div>
		</div>
		
		<?php wp_reset_query(); ?>
		
		<?php } else {
		
		_e('Sorry, but your category is empty!', 'roktabs');
		
		} ?>