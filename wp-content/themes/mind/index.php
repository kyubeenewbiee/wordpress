<?php get_header(); ?>
<div class="container">
  <div class="contents" id="content">
 		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation(
				array(
					'prev_text'           => '< ' . __("Previous","mind"),
					'next_text'           => __("Next","mind") . ' >',
    				'screen_reader_text'  => ' ',
				)
			);

		else :
	  		get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
