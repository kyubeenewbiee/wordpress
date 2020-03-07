<?php get_header(); ?>
<div class="container">
  <div class="contents" id="content">
 		<?php
		if ( have_posts() ) :

			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;
	  
	  		$mind_nextpost = get_adjacent_post(false, '', false); if ($mind_nextpost) : ?>
			<p class="page_next">
				<span><?php esc_html_e('< NEXT', 'mind'); ?></span>
				<a href="<?php echo esc_url(get_permalink($mind_nextpost->ID)); ?>">
					<?php 
					if(has_post_thumbnail($mind_nextpost->ID)) : echo get_the_post_thumbnail($mind_nextpost->ID); 
					else: echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/images/no_photo.gif" alt="' . esc_attr($mind_nextpost->post_title) . '" class="attachment-post-thumbnail">';
					endif; ?>

					<?php echo esc_html($mind_nextpost->post_title); ?>
				</a>
			</p>
			<?php endif; ?>

			<?php $mind_prevpost = get_adjacent_post(false, '', true); if ($mind_prevpost) : ?>
			<p class="page_prev">
				<span><?php esc_html_e('PREV >', 'mind'); ?></span>
				<a href="<?php echo esc_url(get_permalink($mind_prevpost->ID)); ?>">
				<?php 
					if(has_post_thumbnail($mind_prevpost->ID)) : echo get_the_post_thumbnail($mind_prevpost->ID); 
					else: echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/images/no_photo.gif" alt="' . esc_attr($mind_prevpost->post_title) . '" class="attachment-post-thumbnail">';
					endif; ?>

				<?php echo esc_html($mind_prevpost->post_title); ?>
				</a>
			</p>
			<?php endif; ?>
	  
		<?php comments_template(); ?>

		<?php
		else :
	  		get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>