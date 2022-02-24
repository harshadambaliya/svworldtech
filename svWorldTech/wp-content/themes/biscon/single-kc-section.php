<?php

/**
 * The Section template for our theme
 */

do_action( 'atiframebuilder_helpers_set_globals' );

?>
<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
	<?php

	do_action( 'atiframebuilder_header_scripts' );

	do_action( 'atiframebuilder_header_set_boxed_background' );
	wp_head();
	?>
</head>
<body <?php body_class(); ?>>
<div id="kc-section-display">
	<?php
	// Start the loop.
	while ( have_posts() ) : the_post();

		?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="entry-content">
				<?php the_content(); ?>
            </div>

        </article>
		<?php

	endwhile;
	?>
</div>

<?php wp_footer(); ?>

</body>
</html>