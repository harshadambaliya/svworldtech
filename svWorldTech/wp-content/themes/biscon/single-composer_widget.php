<?php

/**
 * The Header template for our theme
 */

do_action( 'atiframebuilder_helpers_set_globals' );

?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no">

    <?php

    do_action( 'atiframebuilder_header_scripts' );

    do_action( 'atiframebuilder_header_set_boxed_background' );

    wp_head();

    ?>

</head>

<body <?php body_class(); ?>>


    <?php if ( have_posts() ) {
        $comp_block_type     = get_post_meta( $post->ID, 'composer_block_type', true );
        $atiframebuilder_cmp_class = ( ! empty( $comp_block_type ) && 'composer_block_sidebar' === $comp_block_type ) ? 'sidebar-type' : '';
    } else {
        $atiframebuilder_cmp_class = '';
    } ?>

    <div class="composer-block-post <?php echo esc_attr( $atiframebuilder_cmp_class ); ?>">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/* translators: %s: Name of current post */
				the_content(
                    sprintf(
                        esc_attr__( 'Continue reading ', 'biscon' ), '<span class="meta-nav">&rarr;</span>',
                        the_title( '<span class="screen-reader-text">', '</span>', false )
				    )
                );

				wp_link_pages(
                    array(
                        'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'biscon' ) . '</span>',
                        'after'       => '</div>',
                        'link_before' => '<span>',
                        'link_after'  => '</span>',
                    )
                );
				?>
			<?php endwhile; ?>

	</div><!-- #primary -->
<?php wp_footer(); ?>

</body>
</html>