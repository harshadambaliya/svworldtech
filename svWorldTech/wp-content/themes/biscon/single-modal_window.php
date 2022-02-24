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

<div class="modal-post">

    <?php /* The loop */ ?>
    <?php while ( have_posts() ) : the_post(); ?>

        <?php
        /* translators: %s: Name of current post */
        the_content(
            sprintf(
                esc_attr__( 'Continue reading ', 'biscon' ),
                '<span class="meta-nav">&rarr;</span>',
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

        <?php comments_template(); ?>

    <?php endwhile; ?>

</div><!-- #primary -->

<?php wp_footer(); ?>

</body>
</html>
