<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
<?php if( comments_open() ){ ?>
	<div id="comments">
		<?php comment_form(); ?>
		<?php if( have_comments() ){ ?>
		<ol id="comments-list">
			<?php wp_list_comments(); ?>
		</ol>
		<?php } ?>
	</div>
	<?php if(get_comment_pages_count() > 1) : ?>
	<div>
    	<?php previous_comments_link( __('Previous Comment', 'mind')); ?>
    	<?php next_comments_link(__('Next Comment', 'mind')); ?>
	</div>
	<?php endif; ?>

<?php } ?>