<?php
//Setup Theme
add_action( 'after_setup_theme', 'mind_theme_setup' );
function mind_theme_setup(){
    load_theme_textdomain( 'mind', get_template_directory() . '/languages' );
	add_theme_support( 'custom-logo', array(
		'width'       => 400,
		'flex-width'  => true,
	) );
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-background' ,array('default-color' => 'f1f1f1'));
	register_nav_menu( 'header-nav',  __('Header Navi','mind') );
	register_nav_menu( 'footer-nav',  __('Footer Navi','mind') );
}

function mind_add_scripts() {
	wp_enqueue_script( 'load-js', get_template_directory_uri() . '/assets/js/mind.js', "", '20190515' );
    wp_enqueue_style( 'style', get_stylesheet_uri() );
}
add_action('wp_enqueue_scripts', 'mind_add_scripts');

// Header Area Manage Function
function mind_customize_register( $wp_customize ) {
$wp_customize->add_section( 'custom_banner_setup', array(
  'title'     => __('Induction Area','mind'),
  'priority'  => 70, 
));

// Induction Area1
$wp_customize->add_setting( 'mind_theme_options1[originPage]', array(
	'default'   => '',
	'type'      => 'theme_mod',
	'transport' => 'refresh',
	'sanitize_callback' => 'absint',
));
$wp_customize->add_control( 'mind_theme_options_page1', array(
  'settings'  => 'mind_theme_options1[originPage]',
  'label'     => __('Induction Banner1','mind'), 
  'description' => __('You can select the fixed page you want to display in the guidance area of the top page.','mind'),
  'section'   => 'custom_banner_setup',
  'type'      => 'dropdown-pages',
));

$wp_customize->add_setting( 'mind_theme_options1[originChkbox]', array(
  'default'   => false,
  'type'      => 'theme_mod',
  'transport' => 'refresh',
  'sanitize_callback' => 'mind_sanitize_checkbox',
));

$wp_customize->add_control( 'mind_theme_options_chkbox1', array(
  'settings'  => 'mind_theme_options1[originChkbox]',
  'label'     => __('Enable','mind'),
  'section'   => 'custom_banner_setup',
  'type'      => 'checkbox',
));

// Induction Area2
$wp_customize->add_setting( 'mind_theme_options2[originPage]', array(
	'default'   => '',
	'type'      => 'theme_mod',
	'transport' => 'refresh',
  'sanitize_callback' => 'absint',
));
$wp_customize->add_control( 'mind_theme_options_page2', array(
  'settings'  => 'mind_theme_options2[originPage]',
  'label'     => __('Induction Banner2','mind'), 
  'section'   => 'custom_banner_setup',
  'type'      => 'dropdown-pages',
));

$wp_customize->add_setting( 'mind_theme_options2[originChkbox]', array(
  'default'   => false,
  'type'      => 'theme_mod',
  'transport' => 'refresh',
  'sanitize_callback' => 'mind_sanitize_checkbox',
));
$wp_customize->add_control( 'mind_theme_options_chkbox2', array(
  'settings'  => 'mind_theme_options2[originChkbox]',
  'label'     => __('Enable','mind'),
  'section'   => 'custom_banner_setup',
  'type'      => 'checkbox',
));

// Induction Area3
$wp_customize->add_setting( 'mind_theme_options3[originPage]', array(
	'default'   => '',
	'type'      => 'theme_mod',
	'transport' => 'refresh',
  'sanitize_callback' => 'absint',
));
$wp_customize->add_control( 'mind_theme_options_page3', array(
  'settings'  => 'mind_theme_options3[originPage]',
  'label'     => __('Induction Banner3','mind'),  
  'section'   => 'custom_banner_setup',
  'type'      => 'dropdown-pages',
));

$wp_customize->add_setting( 'mind_theme_options3[originChkbox]', array(
  'default'   => false,
  'type'      => 'theme_mod',
  'transport' => 'refresh',
  'sanitize_callback' => 'mind_sanitize_checkbox',
));
$wp_customize->add_control( 'mind_theme_options_chkbox3', array(
  'settings'  => 'mind_theme_options3[originChkbox]',
  'label'     => __('Enable','mind'),
  'section'   => 'custom_banner_setup',
  'type'      => 'checkbox',
));


}
add_action( 'customize_register', 'mind_customize_register' );

// Sanitize Function
function mind_sanitize_checkbox( $input ) {
	if ( $input == true ) {
   		return true;
	} else {
   		return false;
	}
}
	


// Header Visual Function */
function mind_custom_headerimage_setup() {
	$args = array(
		'default-text-color'     => '333333',
		'default-image'          => '',
		'header-text'            => false,
		'height'                 => 250,
		'width'                  => 960,
		'max-width'              => 2000,
		'flex-height'            => true,
		'flex-width'             => true,
		'random-default'         => false,
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);

	add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'mind_custom_headerimage_setup' );



// Breadcrumb Function
function mind_breadcrumb(){
  global $post;
  $str = '';
  $pNum = 2;
  $str.= '<div id="breadcrumb">';
  $str.= '<ul>';
  $str.= '<li ><a href="'.esc_url(home_url('/')).'" class="home"><span>'. __('HOME', 'mind') .'</span></a></li>';

  /* Posts  */
  if(is_singular('post')){
    $categories = get_the_category($post->ID);
    $cat = $categories[0];

    if($cat->parent != 0){
      $ancestors = array_reverse(get_ancestors($cat->cat_ID, 'category'));
      foreach($ancestors as $ancestor){
        $str.= '<li><a href="'. get_category_link($ancestor).'"><span>'.get_cat_name($ancestor).'</span></a></li>';
      }
    }
    $str.= '<li><a href="'. get_category_link($cat-> term_id). '"><span>'.$cat->cat_name.'</span></a></li>';
    $str.= '<li><span>'.$post->post_title.'</span></li>';
  }

  /* Custom Posts */
  elseif(is_single() && !is_singular('post')){
    $cp_name = get_post_type_object(get_post_type())->label;
    $cp_url = esc_url(home_url('/')).get_post_type_object(get_post_type())->name;
  
    $str.= '<li><a href="'.$cp_url.'"><span>'.$cp_name.'</span></a></li>';
    $str.= '<li><span>'.$post->post_title.'</span></li>';
  }

  /* Pages */
  elseif(is_page()){
    $pNum = 2;
    if($post->post_parent != 0 ){
      $ancestors = array_reverse(get_post_ancestors($post->ID));
      foreach($ancestors as $ancestor){
        $str.= '<li><a href="'. get_permalink($ancestor).'"><span>'.get_the_title($ancestor).'</span></a></li>';
      }
    }
    $str.= '<li><span>'. $post->post_title.'</span></li>';
  }

  /* Categorys */
  elseif(is_category()) {
    $cat = get_queried_object();
    $pNum = 2;
    if($cat->parent != 0){
      $ancestors = array_reverse(get_ancestors($cat->cat_ID, 'category'));
      foreach($ancestors as $ancestor){
        $str.= '<li><a href="'. get_category_link($ancestor) .'"><span>'.get_cat_name($ancestor).'</span></a></li>';
      }
    }
    $str.= '<li><span>'.$cat->name.'</span></li>';
  }

  /* Tags */
  elseif(is_tag()){
    $str.= '<li><span>'. single_tag_title('', false). '</span></li>';
  }

  /* Archives */
  elseif(is_date()){
    if(get_query_var('day') != 0){
      $str.= '<li><a href="'. get_year_link(get_query_var('year')).'"><span>'.get_query_var('year').'</span></a></li>';
      $str.= '<li><a href="'.get_month_link(get_query_var('year'), get_query_var('monthnum')).'"><span>'.get_query_var('monthnum').'</span></a></li>';
      $str.= '<li><span>'.get_query_var('day'). '</span></li>';
    } elseif(get_query_var('monthnum') != 0){
      $str.= '<li><a href="'. get_year_link(get_query_var('year')).'"><span>'.get_query_var('year').'</span></a></li>';
      $str.= '<li><span>'.get_query_var('monthnum'). '</span></li>';
    } else {
      $str.= '<li><span>'.get_query_var('year').'</span></li>';
    }
  }

  /* Author */
  elseif(is_author()){
    $str.= '<li><span>' . __('Author','mind') . ' : '.get_the_author_meta('display_name', get_query_var('author')).'</span></li>';
  }

  /* Files */
  elseif(is_attachment()){
    $pNum = 2;
    if($post -> post_parent != 0 ){
      $str.= '<li><a href="'.get_permalink($post-> post_parent).'"><span>'.get_the_title($post->post_parent).'</span></a></li>';
    }
    $str.= '<li><span>'.$post->post_title.'</span></li>';
  }

  /* Searchs */
  elseif(is_search()){
    $str.= '<li><span>'.__('Search Keywords','mind').'['.get_search_query().']</span></li>';
  }

  /* 404 Not Found */
  elseif(is_404()){
    $str.= '<li><span>'.__('Not Found.','mind').'</span></li>';
  }

  /* Other */
  else{
    $str.= '<li><span>'.__('Other.','mind').'</span></li>';
  }
  $str.= '</ul>';
  $str.= '</div>';

  
  $allowed_html = array(
    'a' => array( 'href' => array (), 'onclick' => array (), 'target' => array(), ),
    'div' => array( 'id' => array (), 'class' => array ()),
    'span' => array(),
    'ul' => array(), 
    'li' => array(), 
  );
  echo wp_kses($str, $allowed_html );
}


// Copy right Manage Function
function mind_theme_customize_copyright($wp_customize_copyright){
	$wp_customize_copyright->add_setting( 'copyright' , array(
    	'default'    => esc_html(get_bloginfo( 'name' )),
	    'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize_copyright->add_control( 'copyright_edit', array(
		'label' => __('Copy Right', 'mind'),
		'section' => 'title_tagline',
		'settings' => 'copyright', 
  		'type'      => 'text',
		'description' => __('Please set the character string to be displayed in the copy part of the footer.','mind'),
	));
}
add_action( 'customize_register', 'mind_theme_customize_copyright' );


// Display Copy right
function mind_get_the_copyright(){
	return esc_html( get_theme_mod( 'copyright' ) );
}

// Change Link Color Function
function mind_custom_theme_setup( $wp_customize ) {
$wp_customize->add_setting( 'link_color', array(
    'default'    => '#2962ff',
    'sanitize_callback' => 'sanitize_hex_color',
));
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
    'label'      => __( 'Primary Color', 'mind' ),
    'section'    => 'colors',
    'priority' => 10,
)));
}
add_action( 'customize_register', 'mind_custom_theme_setup');

// Display Link Color Styles
if ( get_theme_mod( 'link_color', 'default' ) !== 'default' ) {
    function mind_theme_link_color() {
        $link_color = get_theme_mod( 'link_color' );
        ?>
        <style>
			a{
				/*,header nav ul li a {*/
				color: <?php echo esc_html( $link_color ); ?>; 
			}
			a.readmore{
				border-color: <?php echo esc_html( $link_color ); ?>;
				color: <?php echo esc_html( $link_color ); ?>;
			}
			/* .header-nav, */
			a.wp-block-button__link{
				background-color: <?php echo esc_html( $link_color ); ?>; 
			}
		</style>
        <?php
    }
    add_action( 'wp_head', 'mind_theme_link_color' );
}

// Display Header Text Color Styles
/*
if ( get_theme_mod( 'link_color', 'default' ) !== 'default' ) {
    function mind_theme_link_color() {
        $link_color = get_theme_mod( 'link_color' );
        ?>
        <style>
			a{
				color: <?php echo esc_html( $link_color ); ?>; 
			}
			a.readmore{
				border-color: <?php echo esc_html( $link_color ); ?>;
				color: <?php echo esc_html( $link_color ); ?>;
			}
			a.wp-block-button__link{
				background-color: <?php echo esc_html( $link_color ); ?>; 
			}
		</style>
        <?php
    }
    add_action( 'wp_head', 'mind_theme_link_color' );
}
*/

// Main Image Manage Function
if ( ! function_exists( 'mind_post_thumbnail' ) ) :
	function mind_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;

// Define Posts Bottom Area
if ( ! function_exists( 'mind_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function mind_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category();
			if ( $categories_list ) {
				printf( '<span class="cat-links">Category: ');
					foreach($categories_list as $cl){
						$cat_link = get_category_link($cl->cat_ID);
						echo '<a href="' . esc_url( $cat_link ) . '">' . esc_html($cl->name) . '</a>';
					}
				printf( '</span>');
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tags();
			if ( get_the_tag_list() ) {				
				printf( '<span class="tags-links">Tag: ');
					foreach($tags_list as $tl){
						$tag_link = get_tag_link($tl->term_id );
						echo '<a href="' . esc_url( $tag_link ) . '">' . esc_html($tl->name) . '</a>';
					}
				printf( '</span>');
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			//comments_popup_link("","1コメント","%コメント");
			comments_popup_link("",__('1 Comment','mind'),__('% Comments','mind'));
			echo '</span>';
		}
		edit_post_link(
			__('Edit','mind'),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;



add_action( 'widgets_init', 'mind_theme_slug_widgets_init' );
function mind_theme_slug_widgets_init() {
	
if (function_exists('register_sidebar')) {
 register_sidebar(array(
 'name' => __('Side Area','mind'),
 'id' => 'sidebar1',
 'description'	=> __('It is a widget area that is always displayed on the right side of the screen. If not set, space is available.','mind'),
 'before_widget' => '<div>',
 'after_widget' => '</div>',
 'before_title' => '<h3>',
 'after_title' => '</h3>'
 ));
}

if (function_exists('register_sidebar')) {
 register_sidebar(array(
 'name' => __('Side Under Area','mind'),
 'id' => 'sidebar2',
 'description'	=> __('This widget area is always displayed at the bottom of the right side of the screen. If not set, nothing is displayed.','mind'),
 'before_widget' => '<div class="side_under">',
 'after_widget' => '</div>',
 'before_title' => '<h3>',
 'after_title' => '</h3>'
 ));
}

if (function_exists('register_sidebar')) {
 register_sidebar(array(
 'name' => __('CTA Area','mind'),
 'id' => 'cta_after',
 'description'	=> __('It is a widget area that is displayed below the article content. If not set, nothing is displayed.','mind'),
 'before_widget' => '<div class="cta_area">',
 'after_widget' => '</div>',
 'before_title' => '<h3>',
 'after_title' => '</h3>'
 ));
}
}

/* Set Content Width. */
function mind_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mind_content_width', 1200 );
}
add_action( 'after_setup_theme', 'mind_content_width', 0 );

/* Set wp_body_open. */
if (!function_exists( 'wp_body_open' ) ) {
        function wp_body_open() {
                do_action( 'wp_body_open' );
        }
}

/* Check Active Sidebar */
function mind_body_classes( $classes ) {
	if ( is_active_sidebar( 'sidebar1' ) || is_active_sidebar( 'sidebar2' ) ) {
		$classes[] = 'has-sidebar';
	}
	return $classes;
}
add_filter( 'body_class', 'mind_body_classes' );

