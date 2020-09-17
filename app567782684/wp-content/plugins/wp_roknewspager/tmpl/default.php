<div class="roknewspager-wrapper" id="<?php echo $get_id; ?>">
	<?php if($instance['comments']):?><div class="roknewspager-comments"><?php endif; ?>
	<ul class="roknewspager">
	
		<?php $roknewspager = new WP_Query('cat='.$catid->term_id.'&posts_per_page='.$instance['posts_per_page'].'&orderby='.$instance['order'].'&post_status=publish');
		if($roknewspager->have_posts()) : while($roknewspager->have_posts()) : $roknewspager->the_post(); ?>
		
		<?php $more = 0; ?>
	
		<?php $thumb = get_post_meta($post->ID, '_roknewspager_thumb', TRUE); ?>
	
	    <li>
	        <div class="roknewspager-div">
	            <?php if($instance['thumbs'] && $thumb != ''): ?>
	                <?php if($instance['thumb_link']):?><a href="<?php the_permalink(); ?>"> <?php endif;?>
                    
                    <?php if($option['thumb_generator'] == 'default') :            
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
	
		<?php endwhile; endif; ?>
	
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
<?php $roknewspager_ajax_url = get_bloginfo('wpurl').'/wp-admin/admin-ajax.php?action=roknewspager&id='.$get_id.'&offset=_OFFSET_'; ?>
<script type="text/javascript">
/* <![CDATA[ */
	RokNewsPagerStorage.push({
		'url': '<?php echo $roknewspager_ajax_url; ?>',
		'autoupdate': <?php echo $instance['auto_update']; ?>, 
		'delay': <?php echo $instance['update_delay']; ?>
	});
/* ]]> */
</script>