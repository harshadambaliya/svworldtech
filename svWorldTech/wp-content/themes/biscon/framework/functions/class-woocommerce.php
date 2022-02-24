<?php
/*
The file contain functions for Woocommerce.
*/

class Atiframebuilder_Woocommerce {

    public function __construct() {

        /* Shop Settings */
        add_action( 'after_setup_theme', array( $this, 'woocommerce_support' ) );

        // Change columns count to 3
        add_filter('loop_shop_columns', array( $this, 'loop_columns' ) );

        add_filter( 'woocommerce_output_related_products_args', array( $this, 'related_products_args' ) );

	    add_action( 'wp_enqueue_scripts', array( $this, 'woo_css' ), 10000 );

        add_filter('woocommerce_billing_fields', array( $this, 'custom_billing_fields' ) );

        add_filter( 'woocommerce_checkout_fields' , array( $this, 'override_checkout_fields_ek' ), 99 );


    //remove product title only
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
		add_filter( 'woocommerce_show_page_title', array( $this, 'not_a_shop_page' ) );
		add_filter('woocommerce_show_page_title',array( $this, 'cat_title_false' ), 20 );
		

    }
public function not_a_shop_page() {
    return boolval(!is_shop());
}
public function cat_title_false() {
    return false;
}

    public function woocommerce_support() {
        add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
    }

    public function loop_columns() {
        global $secretlab;
        if ( ! empty( $secretlab['product_columns'] ) ) {
            $quo = $secretlab['product_columns'];
        } else {
            $quo = 4;
        }
        return $quo; // number of products per row
    }

    public function related_products_args($args){
        global $secretlab;
        if ( ! empty( $secretlab['relates_product_products'] ) ) {
            $rpp = $secretlab['relates_product_products'];
        } else {
            $rpp = 4;
        }
        if ( ! empty( $secretlab['relates_product_columns'] ) ) {
            $rpc = $secretlab['relates_product_columns'];
        } else {
            $rpc = 4;
        }
        $args['posts_per_page'] = $rpp; // number of related products
        $args['columns'] = $rpc; // arranged in 2 columns
        return $args;
    }

    public function woo_css() {
        global $secretlab;
	    if ( ! empty( $secretlab['product_columns'] ) ) {
		    $quo = $secretlab['product_columns'];
	    } else {
		    $quo = 4;
	    }

	    if ( ! empty( $secretlab['relates_product_columns'] ) ) {
		    $rpc = $secretlab['relates_product_columns'];
	    } else {
		    $rpc = 4;
	    }
        $woo_cust_css = '';
        if ( ! empty( $secretlab['product_columns'] ) ) {
            $woo_cust_css .= '
            
            html .woocommerce ul.products li.product {width: calc((103.8% /' . $quo . ') - 3.8%);margin-right: 3.8%;}
            html .woocommerce ul.products li.product:nth-child(' . $quo . 'n+1), html .woocommerce-page ul.products li.product:nth-child(' . $quo . 'n+1), html .woocommerce-page[class*=columns-] ul.products li.product:nth-child(' . $quo . 'n+1), html .woocommerce[class*=columns-] ul.products li.product:nth-child(' . $quo . 'n+1) { clear:both}
            
	        ';
        }
        if ( ! empty( $secretlab['relates_product_columns'] ) ) {
            $woo_cust_css .= '
            html .woocommerce-page .related.products ul.products li.product:nth-child(' . $quo . 'n+1) {clear:none}
            html .woocommerce-page .related.products ul.products li.product:nth-child(' . $rpc . 'n+1) {clear:both}
            html .woocommerce .related.products ul.products li.product {width: calc((103.8%/' . $rpc . ') - 3.8%); margin-right: 3.8%;}
            html .woocommerce .related.products ul.products li.product:nth-child(' . $rpc . 'n) {margin-right: 0;}
            ';

        }
        if ( ! empty( $woo_cust_css ) ) {
            wp_add_inline_style( 'atiframebuilder-ownstyles', $woo_cust_css );
        }
    }

    //remove some fields from billing form
    //ref - https://docs.woothemes.com/document/tutorial-customising-checkout-fields-using-actions-and-filters/
    public function custom_billing_fields( $fields = array() ) {
        global $secretlab;
        if ( isset( $secretlab['woocomp'] ) ) {
            if ( '0' === $secretlab['woocomp'] ) {
                unset( $fields['billing_company'] );
            }
        }
        if ( isset( $secretlab['wooadd1'] ) ) {
            if ( '0' === $secretlab['wooadd1'] ) {
                unset( $fields['billing_address_1'] );
            }
        }
        if ( isset( $secretlab['wooadd2'] ) ) {
            if ( '0' === $secretlab['wooadd2'] ) {
                unset( $fields['billing_address_2'] );
            }
        }
        if ( isset( $secretlab['woostate'] ) ) {
            if ( '0' === $secretlab['woostate']) {
                unset( $fields['billing_state'] );
            }
        }
        if ( isset( $secretlab['woocity'] ) ) {
            if ( '0' === $secretlab['woocity'] ) {
                unset( $fields['billing_city'] );
            }
        }
        if ( isset( $secretlab['woophone'] ) ) {
            if ( '0' === $secretlab['woophone'] ) {
                unset( $fields['billing_phone'] );
            }
        }
        if ( isset( $secretlab['woopostcode'] ) ) {
            if ( '0' === $secretlab['woopostcode'] ) {
                unset( $fields['billing_postcode'] );
            }
        }
        if ( isset( $secretlab['woocountry'] ) ) {
            if ( '0' === $secretlab['woocountry'] ) {
                unset( $fields['billing_country'] );
            }
        }

        return $fields;
    }

    // Remove some fields from billing form
    // Our hooked in function - $fields is passed via the filter!
    // Get all the fields - https://docs.woothemes.com/document/tutorial-customising-checkout-fields-using-actions-and-filters/

    public function override_checkout_fields_ek( $fields ) {
        global $secretlab;
        if ( isset( $secretlab['woocomp'] ) ) {
            if ( '0' === $secretlab['woocomp'] ) {
                unset( $fields['billing']['billing_company'] );
            }
        }
        if ( isset( $secretlab['wooadd1'] ) ) {
            if ( '0' === $secretlab['wooadd1'] ) {
                unset( $fields['billing']['billing_address_1'] );
            }
        }
        if ( isset( $secretlab['woopostcode'] ) ) {
            if ( '0' === $secretlab['woopostcode'] ) {
                unset( $fields['billing']['billing_postcode'] );
            }
        }
        if ( isset( $secretlab['woostate'] ) ) {
            if ( '0' === $secretlab['woostate'] ) {
                unset( $fields['billing']['billing_state'] );
            }
        }
        return $fields;
    }


}

?>
