<form role="search" method="get" id="searchform" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div>
		<label class="screen-reader-text" for="s"><?php echo esc_html__( 'Search for:', 'biscon' ); ?></label>
		<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php echo esc_attr__( 'Enter a query', 'biscon' ); ?>" />
		<input type="submit" class="search-submit" value="" />
	</div>
</form>