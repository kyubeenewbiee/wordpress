<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php esc_html(bloginfo( 'charset' )); ?>"/>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="profile" href="http://gmpg.org/xfn/11"/>
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#content">
<?php _e( 'Skip to content', 'mind' ); ?></a>

	<header>
		<div class="header-inner">
			<div class="site-title">
				<h1><a href="<?php echo esc_url(home_url()); ?>">
				<?php if(has_custom_logo()): the_custom_logo()?>
				<?php else: ?>
					<?php echo esc_html(get_bloginfo('name')); ?>
				<?php endif; ?>
					<span><?php echo esc_html(get_bloginfo( 'description' )); ?></span>
				</a>
				</h1>
			</div>
			<a href="#" id="menu_open" class="menu_open"><?php esc_html_e("menu","mind"); ?></a>
		</div>
		<nav id="header-nav" class="header-nav">
		<?php wp_nav_menu( array(
			'theme_location' => 'header-nav',
			'container' => 'div',
			'container_class' => 'header-inner',
			'fallback_cb' => ''
		) ); ?>
			<a href="#" id="menu_close" class="menu_close"><?php esc_html_e("close >","mind"); ?></a>
		</nav>
		<div id="overlay"></div>
	</header>
	<?php if(is_front_page() AND get_header_image()){ ?>
	<div class="custom_header_area">
		<img src="<?php header_image(); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" alt="<?php esc_attr(get_bloginfo('name')); ?>" />
	</div>
	<?php } ?>
	<?php
	if ( is_front_page()){
		$mind_options1 = get_theme_mod('mind_theme_options1');
		$mind_options2 = get_theme_mod('mind_theme_options2');
		$mind_options3 = get_theme_mod('mind_theme_options3');
		if ( $mind_options1['originChkbox'] or $mind_options2['originChkbox'] or $mind_options3['originChkbox'] ) { ?>
			<div class="induction_area">

				<?php
				if ( $mind_options1['originChkbox']) : ?>
				<div>
					<?php 
						$mind_postdata1 = get_post(esc_html($mind_options1['originPage']));
						echo '<div class="thumbnail">';
						if(has_post_thumbnail($mind_options1['originPage'])) : echo get_the_post_thumbnail( esc_html($mind_options1['originPage']), '600' ); 
						else: echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/images/no_photo.gif" alt="' . esc_attr($mind_postdata1->post_title) . '">';
						endif; 
						echo '</div>';
						echo '<h2><a href="' . esc_url(get_permalink(esc_html($mind_options1['originPage']))) . '" >' . esc_html($mind_postdata1->post_title) . "</a></h2>"; 
						echo '<a href="' . esc_url(get_permalink($mind_options1['originPage'])) . '" class="readmore" >'. esc_html__("Read More","mind") . '</a>'; 
					?>
				</div>
				<?php endif; ?>
				<?php
				if ( $mind_options2['originChkbox']) : ?>
				<div>
					<?php 
						$mind_postdata2 = get_post(esc_html($mind_options2['originPage']));
						echo '<div class="thumbnail">';
						if(has_post_thumbnail($mind_options2['originPage'])) : echo get_the_post_thumbnail( esc_html($mind_options2['originPage']), '600' ); 
						else: echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/images/no_photo.gif" alt="' . esc_attr($mind_postdata2->post_title) . '">';
						endif; 
						echo '</div>';
						echo '<h2><a href="' . esc_url(get_permalink(esc_html($mind_options2['originPage']))) . '" >' . esc_html($mind_postdata2->post_title) . "</a></h2>"; 
						echo '<a href="' . esc_url(get_permalink($mind_options2['originPage'])) . '" class="readmore" >'. esc_html__("Read More","mind") . '</a>'; 
					?>
				</div>
				<?php endif; ?>
				<?php
				if ( $mind_options3['originChkbox']) : ?>
				<div>
					<?php 
						$mind_postdata3 = get_post(esc_html($mind_options3['originPage']));
						echo '<div class="thumbnail">';
						if(has_post_thumbnail($mind_options3['originPage'])) : echo get_the_post_thumbnail( esc_html($mind_options3['originPage']), '600' ); 
						else: echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/images/no_photo.gif" alt="' . esc_attr($mind_postdata3->post_title) . '">';
						endif; 
						echo '</div>';
						echo '<h2><a href="' . esc_url(get_permalink(esc_html($mind_options3['originPage']))) . '" >' . esc_html($mind_postdata3->post_title) . "</a></h2>"; 
						echo '<a href="' . esc_url(get_permalink($mind_options3['originPage'])) . '" class="readmore" >'. esc_html__("Read More","mind") . '</a>'; 
					?>
				</div>
				<?php endif; ?>
			</div>
		<?php }} ?>	
	
