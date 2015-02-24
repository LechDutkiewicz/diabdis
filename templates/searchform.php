<form role="search" method="get" class="search-form styled-form text-center" action="<?php echo esc_url(home_url('/')); ?>">
	<label class="sr-only"><?php _e('Search for:', 'roots'); ?></label>
	<input type="search" value="<?php echo get_search_query(); ?>" name="s" class="search-field margin bottom-big focus" placeholder="<?php _e('Search articles', 'roots'); ?>" required>
	<button type="submit" class="btn btn-cta btn-blue"><i class="fa fa-search"></i><?php _e('Search', 'roots'); ?></button>
</form>
