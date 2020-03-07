<?php get_header(); ?>

<div class="container">
  <div class="contents">

			<div class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'mind' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'mind' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</div><!-- .error-404 -->

		</div><!-- #main -->
	  <?php get_sidebar(); ?>
	</div><!-- #primary -->

<?php
get_footer();
