<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header(); ?>

	<div class="e404">

		<?php do_action( 'atiframebuilder_layout_icon_404' ); ?>

			<header class="page-header">
				<h1 class="page-title"><?php do_action( 'atiframebuilder_layout_title_404' ); ?></h1>
			</header>
			<p><?php do_action( 'atiframebuilder_layout_descr_404' ); ?></p>
			<?php get_search_form(); ?>

	</div>

<?php get_footer(); ?>
