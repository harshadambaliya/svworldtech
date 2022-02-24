<?php
/**
 * The template for displaying the footer
 */
?>
<!-- footer -->

<?php
do_action( 'atiframebuilder_footer_set_footer_sidebar_layout' );
?>

<?php
do_action( 'atiframebuilder_helpers_modal' );
?>
</main>

<?php
do_action( 'atiframebuilder_footer_footer' );

do_action( 'atiframebuilder_layout_scroll_button' );
?>

<?php
do_action( 'atiframebuilder_footer_footer_close_boxed_layout' );
?>

<?php wp_footer(); ?>

</body>
</html>