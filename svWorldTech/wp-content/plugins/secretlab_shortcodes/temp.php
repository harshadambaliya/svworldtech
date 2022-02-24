function ssc_js_ini(){
        // Additional js code for MASONRY
        if ($grid_type == 'masonry') {
            $masonry_code = ",
					layoutMode: 'masonry',
                    masonry: {
                    columnWidth: '.grid-item',
                    horizontalOrder: true
                    }";
        } else {
            $masonry_code = '';
        }
        echo '<script type="text/javascript">
            jQuery(document).ready(function ($) {
                "use strict";

				var $container = $("#grid").isotope({
                    itemSelector: ".grid-item"
                    ' . $masonry_code . '
                });

                $("#filter a").click(function () {

                    $("#filter li a").removeClass("current");
                    $(this).addClass("current");
                    var selector = $(this).attr("data-filter");

                    $("#grid").isotope({
                        filter: selector,
                        animationOptions: {
                            duration: 1000,
                            easing: "easeInOutBack",
                            queue: false
                        }
                    });
                    return false;

                });
                
				$container.imagesLoaded().progress( function() {
					$container.isotope("layout");
				});
				
            });
        </script>';
    }

    //add_action( 'wp_footer', 'ssc_js_ini' );