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
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="format-detection" content="telephone=no">
	
	<?php

    do_action( 'atiframebuilder_header_scripts' );

    do_action( 'atiframebuilder_header_set_boxed_background' );

    wp_head();

	?>
	
</head>

<body <?php body_class(); ?>>

<?php
wp_body_open();
do_action( 'atiframebuilder_header_pageloader' );
do_action( 'atiframebuilder_header_set_boxed_layout' );
?>
<!-- HEADER START -->
<div class="headline">
	<?php
    do_action( 'atiframebuilder_header_header_layout' );
	?>
</div>
<!-- HEADER END -->

<main class="<?php do_action( 'atiframebuilder_layout_main_tag_classes' ); do_action( 'atiframebuilder_blog_number_of_columns' ); ?>">
    <?php
    do_action( 'atiframebuilder_header_set_header_sidebar_layout' );
    ?>