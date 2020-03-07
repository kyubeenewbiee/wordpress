<div class="breadcrumb container"><?php if(!is_home()): mind_breadcrumb(); endif;?></div>
<footer>
	<nav id="footer-nav" class="footer-nav">
		<?php wp_nav_menu( array(
			'theme_location' => 'footer-nav',
			'container' => 'div',
			'container_class' => 'footer-inner',
			'fallback_cb' => ''
		) ); ?>
	</nav>
	<p class="copyright">&copy; <?php 
		$mind_copy = esc_html(mind_get_the_copyright('copyright')); 
		if($mind_copy){
			echo $mind_copy;
		}else{
			esc_html(bloginfo('name'));
		} 
	 ?> <?php esc_html_e("All Rights Reserved.","mind"); ?> </p>
</footer>
<?php wp_footer(); ?>
</body>
</html>