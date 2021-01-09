<?php
// add compatibilty for genesis_get_config
if(!function_exists("genesis_get_config")){
    function genesis_get_config( $config ) {

        $parent_file = sprintf( '%s/config/%s.php', get_template_directory(), $config );
        $child_file  = sprintf( '%s/config/%s.php', get_stylesheet_directory(), $config );
      
        $data = array();
      
        if ( is_readable( $child_file ) ) {
          $data = require $child_file;
        }
      
        if ( empty( $data ) && is_readable( $parent_file ) ) {
          $data = require $parent_file;
        }
      
        return (array) $data;
      
      }
}


/**
 * No Header Right widget area
 *
 * @since 1.0.0
 * @param array $widgets
 * @return array $widgets
 */
function seeds_starter_remove_header_right( $widgets ) {
	$widgets['header-right'] = array();
	return $widgets;
}

// get genesis style selecttion on genesis->theme setting
function jessica_get_style_selection(){
    return genesis_get_option( 'style_selection' );
}

// get default link color
function jessica_get_default_link_color(){
    return '#9dafb6';
}

// get default accent color
function jessica_get_default_accent_color(){
    return '#20221d';
}

// get link color
function jessica_get_link_color(){
    return (get_theme_mod("jessica_link_color") != "") ? get_theme_mod("jessica_link_color") : jessica_get_default_link_color();
}

// get accent color
function jessica_get_accent_color(){
    return (get_theme_mod("jessica_accent_color") != "") ? get_theme_mod("jessica_accent_color") : jessica_get_default_accent_color();
}

function darken_color($rgb, $darker=2){
    // value darker between 1 to 4, can be decimal
    $hash = (strpos($rgb, '#') !== false) ? '#' : '';
    $rgb = (strlen($rgb) == 7) ? str_replace('#', '', $rgb) : ((strlen($rgb) == 6) ? $rgb : false);
    if(strlen($rgb) != 6) return $hash.'000000';
    $darker = ($darker > 1) ? $darker : 1;

    list($R16,$G16,$B16) = str_split($rgb,2);

    $R = sprintf("%02X", floor(hexdec($R16)/$darker));
    $G = sprintf("%02X", floor(hexdec($G16)/$darker));
    $B = sprintf("%02X", floor(hexdec($B16)/$darker));

    return $hash.$R.$G.$B;
}

// render custom css
function jessica_get_custom_css(){
    $link_color = jessica_get_link_color();
    $link_hover_color = darken_color($link_color);
    $accent_color = jessica_get_accent_color();
    $accent_hover_color = darken_color($accent_color);
return <<<CSS
a,
.sidebar .widget_recent_comments a,
.entry-header .entry-meta,
.entry-header .entry-meta a,
.breadcrumb,
.entry-content div.it-exchange-super-widget .cart-items-wrapper .cart-item .item-info,
.woocommerce-page .summary .product_meta > span, 
.entry-title a,
.sidebar .widget-title a,
.wsm-banner .custom-text .more-link a,
.genesis-nav-menu .sub-menu a,
.wsmfeaturedpost .entry-header .entry-meta,
.widget-social a.genericon,
.bottom-widgets li a,
.widget_tag_cloud .tagcloud a,
.footer-widgets, .footer-widgets a,
.sidebar li a,
.content .entry-content .more-link a,
.breadcrumb a{
    color:$link_color;
}
.breadcrumb a:hover,
.sidebar li a:hover,
.entry-title a:hover,
.sidebar .widget-title a:hover,
.wpsc-breadcrumbs a:hover,
.content .entry-content .more-link a:hover,
a:hover,
.entry-header .entry-meta a:hover,
.sidebar .widget_recent_comments a:hover,
.archive-pagination a:hover,
.bottom-widgets li a:hover,
.widget_tag_cloud .tagcloud a:hover,
.footer-widgets, .footer-widgets a:hover,
.home-mid-nav .menu .menu-item a:hover{
    color: $link_hover_color;
}

div.woocommerce a.button,
div.woocommerce #respond input#submit.alt,
div.woocommerce a.button.alt,
div.woocommerce button.button.alt,
div.woocommerce input.button.alt,
button,
input[type="button"],
input[type="reset"],
input[type="submit"],
.button,
.cta-box .more-link a,
.archive-pagination li a:hover,
.archive-pagination .active a,
.widget_tag_cloud .tagcloud a:hover,
body.woocommerce-page a.button,
body.woocommerce-page button.button,
body.woocommerce-page input.button,
body.woocommerce-page #respond input#submit,
body.woocommerce-page #content input.button,
body.woocommerce-page button.button.alt,
body.woocommerce-page input.button.alt,
body.woocommerce-page #respond input#submit.alt,
body.woocommerce-page #content input.button.alt,
.wsmfeaturedpost .entry-header .entry-meta,
.footer-widgets .widget_tag_cloud .tagcloud a:hover,
body.woocommerce-page .woocommerce-message:before,
body.woocommerce-page .woocommerce-info:before,
body.woocommerce-page .woocommerce-error:before,
body.woocommerce-page .woocommerce-message:before,
body.woocommerce-page .woocommerce-info:before,
body.woocommerce-page button.button.alt,
body.woocommerce-page div.product .woocommerce-tabs ul.tabs li,
body.woocommerce-page div.product .woocommerce-tabs ul.tabs li a,
div#it-exchange-store .it-exchange-product-permalink,
table.tablepress thead th,
table.tablepress tfoot th,
div.it-exchange-super-widget div.two-actions .cart-action.checkout:hover,
div.it-exchange-super-widget div.two-actions .cart-action.view-cart:hover,
.tax-it_exchange_tag .it_exchange_prod a.it-exchange-product-permalink:hover,
.tax-it_exchange_category .it_exchange_prod a.it-exchange-product-permalink:hover,
.footer-widgets .widget_wpsc_product_tags  #product_tag_wrap a:hover,
.widget_wpsc_product_tags  #product_tag_wrap a:hover,
.entry-content div.product_grid_display .item_image .more-details a,
.entry-content div.product_grid_display .product_grid_item .addtocart input[type="submit"],
.entry-content div.product_grid_display .product_grid_item .addtocart input.wpsc_buy_button,
.content div.it-exchange-super-widget .it-exchange-sw-product .buy-now-button input[type="submit"],
div.single_product_display form.product_form .wpsc_buy_button_container input[type="submit"],
div.single_product_display form.product_form .wpsc_buy_button,
div.shopping-cart-wrapper .shoppingcart #cart-widget-links a.gocheckout,
table.list_productdisplay .wpsc_buy_button_container a.wpsc_buy_button,
.woocommerce-page div.product .woocommerce-tabs ul.tabs li a:hover,
.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active a,
.widget-social a.genericon {
    background-color: $accent_color;
}

div.woocommerce a.button:hover,
div.woocommerce #respond input#submit.alt:hover,
div.woocommerce a.button.alt:hover,
div.woocommerce button.button.alt:hover,
div.woocommerce input.button.alt:hover,
button:hover,
input[type="button"]:hover,
input[type="reset"]:hover,
input[type="submit"]:hover,
.button:hover,
.cta-box .more-link a:hover,
body.woocommerce-pbodyage a.button:hover,
body.woocommerce-page button.button:hover,
body.woocommerce-page input.button:hover,
body.woocommerce-page #respond input#submit:hover,
body.woocommerce-page #content input.button:hover,
body.woocommerce-page button.button.alt:hover,
body.woocommerce-page input.button.alt:hover,
body.woocommerce-page a.button:hover,
body.woocommerce-page #respond input#submit.alt:hover,
body.woocommerce-page #content input.button.alt:hover,
body.woocommerce button.button.alt.disabled,
body.woocommerce button.button.alt.disabled:hover,
body.woocommerce div.product .woocommerce-tabs ul.tabs li.active,
body.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active a,
body.woocommerce-page div.product .woocommerce-tabs ul.tabs li a:hover,
body.woocommerce-page button.button.alt:hover,
div#it-exchange-store .it-exchange-product-permalink:hover,
.entry-content div.product_grid_display .item_image .more-details a:hover,
.entry-content div.product_grid_display .product_grid_item .addtocart input[type="submit"]:hover,
.entry-content div.product_grid_display .product_grid_item .addtocart input.wpsc_buy_button:hover,
.content div.it-exchange-super-widget .it-exchange-sw-product .buy-now-button input[type="submit"]:hover,
div.shopping-cart-wrapper .shoppingcart #cart-widget-links a.gocheckout:hover,
div#list_view_products_page_container .wpsc_buy_button_container .wpsc_buy_button:hover,
div.single_product_display form.product_form .wpsc_buy_button_container input[type="submit"]:hover,
div.single_product_display form.product_form .wpsc_buy_button:hover,
.widget-social a.genericon:hover {
    background-color: $accent_hover_color;
}

body.woocommerce-page .woocommerce-error,
body.woocommerce-page .woocommerce-message,
body.woocommerce-page .woocommerce-info {
    border-color: $accent_color;
}

body.woocommerce-page .woocommerce-message:before, 
body.woocommerce-page .woocommerce-info:before, 
body.woocommerce-page .woocommerce-error:before, 
body.woocommerce-page .woocommerce-message:before, 
body.woocommerce-page .woocommerce-info:before{
    background-color:transparent;
}

.wp-block-button .has-background.has-link-color-background-color{
    background-color: $link_color;
}
.wp-block-button .has-background.has-link-color-background-color:hover{
    background-color: $link_hover_color;
}
.wp-block-button .has-text-color.has-link-color-color{
    color: $link_color
}

.wp-block-button .has-background.has-accent-color-background-color{
    background-color: $accent_color;
}
.wp-block-button .has-background.has-accent-color-background-color:hover{
    background-color: $accent_hover_color;
}
.wp-block-button .has-text-color.has-accent-color-color{
    color: $accent_color;
}

CSS;
}