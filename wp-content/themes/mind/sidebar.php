<aside id="sidebar">
  <div class="sidebar-inner">
   <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar1') ) : 
	  dynamic_sidebar('sidebar1') ?>
  <?php endif; ?>

   <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar2') ) : 
	  dynamic_sidebar('sidebar2') ?>
  <?php endif; ?>

  </div>
</aside>
