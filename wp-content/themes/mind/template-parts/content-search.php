<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mind
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( 'post' === get_post_type() ) :?>
			<div class="entry-meta"><p class="post_date"><?php esc_html_e("last updated:","mind")?> <?php the_modified_date(get_option( 'date_format' )); ?></p></div>
		<?php endif; 

		if ( !is_singular() ) :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
		<div class="item-info"><?php mind_entry_footer(); ?></div>
	</header><!-- .entry-header -->

	<?php mind_post_thumbnail(); ?>

	<div class="entry-content">

		<?php
		if ( is_singular() ) :

		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'mind' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );
		
		/* Display link when page is divided by more */
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mind' ),
			'after'  => '</div>',
		) );

		else :
	
		the_excerpt( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'mind' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );
		?>
		<div class="readmore_box"><a href="<?php echo esc_url(get_permalink()); ?>" class="readmore"><?php esc_html_e("Read More","mind") ?></a></div>
		<?php
			endif;
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
