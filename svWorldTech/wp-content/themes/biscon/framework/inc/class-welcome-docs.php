<?php

class Atiframebuilder_Docs {

	public function __construct() {
		wp_enqueue_script( 'atiframebuilder-import-attach-js',
			esc_url( get_template_directory_uri() ) . '/js/import_attach.js',
			array( 'jquery', 'jquery-ui-tooltip', 'jquery-ui-progressbar' ),
			20140421,
			true );
		wp_enqueue_script( 'atiframebuilder-welcome-js',
			esc_url( get_template_directory_uri() ) . '/framework/js/welcome.js',
			array( 'jquery' ),
			'1.0',
			true );
		wp_enqueue_script( 'bootstrap',
			esc_url( get_template_directory_uri() ) . '/js/bootstrap.min.js',
			array( 'jquery' ),
			'1.0',
			true );

		wp_enqueue_style( 'atiframebuilder-welcome',
			esc_url( get_template_directory_uri() ) . '/framework/css/welcome.css',
			array(),
			'3.03' );
		wp_enqueue_style( 'jquery-ui',
			esc_url( get_template_directory_uri() ) . '/framework/css/jquery-ui.css',
			array(),
			'3.03' );

	}

	public function render() {

		$active_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : 'welcomedocs';
		if ( $active_tab == 'welcomedocs' ) {
			$active_class = 'nav-tab-active';
		} else {
			$active_class = '';
		}

		echo '<div class="wrap">
<h2 class="nav-tab-wrapper">
    <a href="?page=welcome" class="nav-tab">' . esc_html__( 'Installation', 'biscon' ) . '</a>
    <a href="?page=welcomedocs" class="nav-tab ' . $active_class . '">' . esc_html__( 'Documentation',
				'biscon' ) . '</a>
</h2>';

		echo '<div class="increase">';

		echo '<div class="container">';

		echo '<br><h1>' . esc_html__( 'Welcome to Atiframe Theme', 'biscon' ) . '</h1>
 		<p class="descr">' . esc_html__( 'Fully Customizable and Easy-to-use', 'biscon' ) . '</p>
 

	<div class="tab-content"  class="tab-pane fade in active" id="firsttab">

            
            <div class="row">
                <div class="col-md-6 col-sm-12">
                	<h2>' . esc_html__( 'Settings', 'biscon' ) . '</h2>
					<div class="helpful">
						<ol>
						<li><a href="admin.php?page=revslider">' . esc_html__( 'Edit Sliders', 'biscon' ) . '</a></li>
						<li><a href="admin.php?page=_sl_theme_options">' . esc_html__( 'Theme Options',
				'biscon' ) . '</a> ' . esc_html__( '(choose colors, design, pageloader, type of footer and header)',
				'biscon' ) . '</li>
						<li><a href="admin.php?page=_sl_theme_options&tab=8">' . esc_html__( 'Typography', 'biscon' ) . '</a></li>
						<li><a href="nav-menus.php">' . esc_html__( 'Menu',
				'biscon' ) . '</a> ' . esc_html__( '(configure your menu items)', 'biscon' ) . '</li>
						<li><a href="edit.php?post_type=composer_widget">' . esc_html__( 'Edit Headers',
				'biscon' ) . '</a> ' . esc_html__( '(change design of header)', 'biscon' ) . '</li>
						<li><a href="edit.php?post_type=composer_widget">' . esc_html__( 'Edit Footers',
				'biscon' ) . '</a> ' . esc_html__( '(if you choose it at Theme Options -> Design -> Footer)',
				'biscon' ) . '</li>
						<li><a href="widgets.php">' . esc_html__( 'Widgets',
				'biscon' ) . '</a> ' . esc_html__( '(choose custom footer to display)', 'biscon' ) . '</li>
						<li><a href="admin.php?page=icon-manager-dashboard">' . esc_html__( 'Icon Fonts',
				'biscon' ) . '</a></li>
						<li><a href="admin.php?page=wpcf7">' . esc_html__( 'Contact Forms in Contact Form 7 Plugin',
				'biscon' ) . '</a> ' . esc_html__( '(setup your email data to receive requests)',
				'biscon' ) . '<a href="/wp-admin/admin.php?page=_sl_theme_options&tab=1">' . esc_html__( 'Change all email addresses',
				'biscon' ) . '</a></li>
						</ol>
					</div>
                </div>
                
                <div class="col-md-6 col-sm-12">
                	<h2>' . esc_html__( 'Documentation', 'biscon' ) . '</h2>
					<div class="helpful">
						<p>' . esc_html__( 'Online knowledge base', 'biscon' ) . ' <a href="https://support.secretlab.pw/help-center" target="_blank">https://support.secretlab.pw/help-center</a> </p>
						<h3>' . esc_html__( 'Auto Installation', 'biscon' ) . '</h3>
						<p><iframe width="100%" height="315" src="https://www.youtube.com/embed/DWIEGQkuoSg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></p>
					</div>
                </div>
                
            </div><!-- row -->
            


            
            <div class="row pt30">
            	<div class="col-md-6 col-sm-12">
            		<h2>' . esc_html__( 'Manager of Customer Care', 'biscon' ) . '</h2>
            		<div class="manager">
            			<img src="' . get_template_directory_uri() . '/images/manager.jpg" alt="' . esc_attr__( 'Rate the theme',
				'biscon' ) . '">
            			<p class="name">' . esc_html__( 'Oleg Malkov', 'biscon' ) . '</p>
            			<p>' . esc_html__( 'Send us feedback and criticism. Your feedback and experience is valuable for us! It will help to improve the theme.',
				'biscon' ) . '</p>
            			<b>m@secretlab.pw</b>
            		</div>
            	</div>
            	<div class="col-md-6 col-sm-12">
            		
            	</div>
            </div>
            <div class="row pt30">
            	<div class="col-md-12">
            		
            	</div>
            </div>
</div><!-- Tab Content -->
</div>';


		echo '</div>';

		echo '</div>';

	}
}
