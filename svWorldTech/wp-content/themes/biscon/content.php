
<?php
/**
 * The template for displaying content
 * Used for both single and index/archive/search.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    // CAGETORY page
    if ( ! is_single() && ! is_search() ) {
	    do_action( 'atiframebuilder_archive_template' );

    } elseif ( is_single() ) {
        // SINGLE
	    do_action( 'atiframebuilder_single_template' );

    } elseif ( ! is_single() && is_search() ) {
        // Only display Excerpts for Search
    do_action( 'atiframebuilder_archive_template' );
     } ?>
</article><!-- #post -->

