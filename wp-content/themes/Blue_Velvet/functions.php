<?php 

require_once ("include/theme-support.php");
require_once ("include/enqueue-style.php");
require_once ("template/shop-page.php");


    //==============================================//
    //Wrap before quantity input field
    //==============================================//
    function rakeya_wrap_before_quantity_input(){
        ?>
<div class="pro-qty">
        <?php
    }
    add_action('woocommerce_before_quantity_input_field','rakeya_wrap_before_quantity_input',10);
    
    
    //==============================================//
    //Wrap after quantity input field
    //==============================================//
    function rakeya_wrap_after_quantity_input(){
        ?>
</div>
        <?php
    }
    
    add_action('woocommerce_after_quantity_input_field','rakeya_wrap_after_quantity_input',10);

?>

<?php
//==============================================//
//add Classes to the inputs and its containers
//==============================================//
add_filter('woocommerce_form_field_args','rakeya_add_classes_checkout_page',10);

function rakeya_add_classes_checkout_page($defaults){
$defaults['class'][]='form-group';
$defaults['input_class'][] = 'form-control';
return $defaults;

}

/**
 * @snippet       WooCommerce Show Product Image @ Checkout Page
 * @author        Sandesh Jangam
 * @donate $7     https://www.paypal.me/SandeshJangam/7
 */
 
add_filter( 'woocommerce_cart_item_name', 'ts_product_image_on_checkout', 10, 3 );
 
function ts_product_image_on_checkout( $name, $cart_item, $cart_item_key ) {
     
    /* Return if not checkout page */
    if ( ! is_checkout() ) {
        return $name;
    }
     
    /* Get product object */
    $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
 
    /* Get product thumbnail */
    $thumbnail = $_product->get_image();
 
    /* Add wrapper to image and add some css */
    $image = '<div class="ts-product-image" style="width: 52px; height: 45px; display: inline-block; padding-right: 7px; vertical-align: middle;">'
                . $thumbnail .
            '</div>'; 
 
    /* Prepend image to name and return it */
    return $image . $name;
}



/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'THEMENAME' ),
) );
if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
    // File does not exist... return an error.
    return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
    // File exists... require it.
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}


/**
 * Change a currency symbol
 */
add_filter( 'woocommerce_currency_symbol', 'wc_change_uae_currency_symbol', 10, 2 );

function wc_change_uae_currency_symbol( $currency_symbol, $currency ) {
	switch ( $currency ) {
		case 'AED':
			$currency_symbol = 'AED';
		break;
	}

	return $currency_symbol;
}

//Hide Price Range for WooCommerce Variable Products in shop page

add_filter( 'woocommerce_variable_sale_price_html', 
'lw_variable_product_price', 10, 2 );
add_filter( 'woocommerce_variable_price_html', 
'lw_variable_product_price', 10, 2 );

function lw_variable_product_price( $v_price, $v_product ) {

// Product Price
$prod_prices = array( $v_product->get_variation_price( 'min', true ), 
                            $v_product->get_variation_price( 'max', true ) );

if(is_product()){
    $prod_price = $prod_prices[0]!==$prod_prices[1] ? sprintf(__('%1$s', 'woocommerce'), 
    wc_price( $prod_prices[0] ) ."-".wc_price( $prod_prices[1] ) ) : wc_price( $prod_prices[0] )."-".wc_price( $prod_prices[1] );
}else{
    $prod_price = $prod_prices[0]!==$prod_prices[1] ? sprintf(__('%1$s', 'woocommerce'), 
    wc_price( $prod_prices[0] ) ) : wc_price( $prod_prices[0] );
}

// Regular Price
$regular_prices = array( $v_product->get_variation_regular_price( 'min', true ), 
                          $v_product->get_variation_regular_price( 'max', true ) );
sort( $regular_prices );
if(is_product()){
    $regular_price = $regular_prices[0]!==$regular_prices[1] ? sprintf(__('%1$s', 'woocommerce'), 
    wc_price( $prod_prices[0] ) ."-".wc_price( $prod_prices[1] ) ) : wc_price( $prod_prices[0] )."-".wc_price( $prod_prices[1] );
}else{
    $regular_price = $regular_prices[0]!==$regular_prices[1] ? sprintf(__('%1$s','woocommerce')
    , wc_price( $regular_prices[0] ) ) : wc_price( $regular_prices[0] );
}


if ( $prod_price !== $regular_price ) {
$prod_price = '<del>'.$regular_price.$v_product->get_price_suffix() . '</del> <ins>' . 
                       $prod_price . $v_product->get_price_suffix() . '</ins>';
}
return $prod_price;
    
}



if( !function_exists('yith_customize_woocommerce_order_formatted_billing_address') ){
    function yith_customize_woocommerce_order_formatted_billing_address( $address ){
        if( function_exists('ywccp_get_custom_fields') ){
            $custom_billing_fields = ywccp_get_custom_fields( 'billing' );
            foreach ( $address as $key => $value ){
                if( array_key_exists( 'billing_' . $key, $custom_billing_fields ) ) continue;
                $address[$key] = ucwords(str_replace( '_',' ',$key )) . ': ' . $value;
            }
        }

        return $address;
    }
}
add_filter('woocommerce_order_formatted_billing_address','yith_customize_woocommerce_order_formatted_billing_address',10 );


if( !function_exists('yith_customize_woocommerce_order_formatted_shipping_address') ){
    function yith_customize_woocommerce_order_formatted_shipping_address( $address ){
        if( function_exists('ywccp_get_custom_fields') ){
            $custom_shipping_fields = ywccp_get_custom_fields( 'shipping' );
            foreach ( $address as $key => $value ){
                if( array_key_exists( 'shipping_' . $key, $custom_shipping_fields ) ) continue;
                $address[$key] = ucwords(str_replace( '_',' ',$key )) . ': ' . $value;
            }
        }

        return $address;
    }

}
add_filter('woocommerce_order_formatted_shipping_address','yith_customize_woocommerce_order_formatted_shipping_address',10 );


add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {
unset($fields['billing']['billing_country']);
unset($fields['billing']['billing_state']);
unset($fields['billing']['billing_company']);
unset($fields['shipping']['shipping_company']);
unset($fields['shipping']['shipping_country']);
unset($fields['shipping']['shipping_state']);

return $fields;
}

add_filter( 'woocommerce_default_address_fields' , 'bbloomer_rename_state_province', 9999 );
 
function bbloomer_rename_state_province( $fields ) {
    $fields['city']['label'] = 'Emirate';
    return $fields;
}



// For implementation instructions see: https://aceplugins.com/how-to-add-a-code-snippet/

/**
 * Change the checkout city field to a dropdown field.
 */
function ace_change_city_to_dropdown( $fields ) {

	$cities = array(
		'Abu Dhabi',
		'Dubai',
		'Ajman',
		'Sharjah',
		'Ras Al Khaimah',
		'Fujairah',
		'Umm Al-Quwain',
	);

	$city_args = wp_parse_args( array(
		'type' => 'select',
		'options' => array_combine( $cities, $cities ),
	), $fields['shipping']['shipping_city'] );

	$fields['shipping']['shipping_city'] = $city_args;
	$fields['billing']['billing_city'] = $city_args;

	return $fields;

}
add_filter( 'woocommerce_checkout_fields', 'ace_change_city_to_dropdown' );