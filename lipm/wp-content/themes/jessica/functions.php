<?php
/**
 * Jessica.
 *
 * This file adds functions to the Jessica Theme.
 *
 * @package Jessica
 * @author  9seeds
 * @license GPL-2.0-or-later
 * @link    https://9seeds.com/
 */

add_action( 'after_setup_theme', 'jessica_i18n' );
/**
 * Load the child theme textdomain for internationalization.
 *
 * Must be loaded before Genesis Framework /lib/init.php is included.
 * Translations can be filed in the /languages/ directory.
 *
 * @since 1.2.0
 */
function jessica_i18n() {
	load_child_theme_textdomain( 'jessica', get_stylesheet_directory() . '/languages' );
}

// Start the Genesis engine.
require_once TEMPLATEPATH . '/lib/init.php';

// Load Jessica Init.
require_once 'lib/init.php';

// load helper.
require_once CHILD_DIR . '/lib/helper.php';

add_action( 'wp_enqueue_scripts', 'jessica_enqueue_assets' );
/**
 * Enqueue theme assets.
 */
function jessica_enqueue_assets() {
	wp_enqueue_style( 'jessica', get_stylesheet_uri() );
	wp_style_add_data( 'jessica', 'rtl', 'replace' );

	// only add custom css if color change.
	if ( jessica_get_default_link_color() != jessica_get_link_color() || jessica_get_default_accent_color() != jessica_get_accent_color() ) {
		wp_add_inline_style( 'jessica', jessica_get_custom_css() );
	}
}

/**
 * Load Editor Scripts
 */
function jessica_editor_scripts() {
	wp_enqueue_script( 'jessica-editor', get_stylesheet_directory_uri() . '/editor.js', array( 'wp-blocks', 'wp-dom' ), filemtime( get_stylesheet_directory() . '/editor.js' ), true );
}
add_action( 'enqueue_block_editor_assets', 'jessica_editor_scripts' );


// Calls the theme's constants & files.
jessica_init();

// Editor Styles.
add_theme_support( 'editor-styles' );
add_editor_style( 'style-editor.css' );

// Adds support for accessibility.
add_theme_support( 'genesis-accessibility', genesis_get_config( 'accessibility' ) );

// add gutebnerg support.
//add_theme_support( 'gutenberg' );
add_theme_support( 'align-wide' );
add_theme_support( 'responsive-embeds' );

// disable custom color.
add_theme_support( 'disable-custom-colors' );

// available color.
$available_color = array(
	'jessica-pink'   => '#b34065',
	'jessica-red'    => '#C42030',
	'jessica-brown'  => '#806641',
	'jessica-green'  => '#608636',
	'jessica-purple' => '#500095',
);

// only show color style options if is already setup.
$editor_color = jessica_get_style_selection();
if ( '' != $editor_color ) {
	// Create additional color style options.
	add_theme_support(
		'genesis-style-selector',
		array(
			'jessica-pink'   => __( 'Pink', 'jessica' ),
			'jessica-red'    => __( 'Red', 'jessica' ),
			'jessica-brown'  => __( 'Brown', 'jessica' ),
			'jessica-green'  => __( 'Green', 'jessica' ),
			'jessica-purple' => __( 'Purple', 'jessica' ),
		)
	);

	add_theme_support(
		'editor-color-palette', array(
			array(
				'name'  => esc_html__( 'accent color', 'jessica' ),
				'slug'  => 'accent_color',
				'color' => $available_color[ $editor_color ],
			),
		)
	);

} else {
	add_theme_support(
		'editor-color-palette', array(
			array(
				'name'  => esc_html__( 'accent color', 'jessica' ),
				'slug'  => 'accent_color',
				'color' => jessica_get_accent_color(),
			),
			array(
				'name'  => esc_html__( 'link color', 'jessica' ),
				'slug'  => 'link_color',
				'color' => jessica_get_link_color(),
			),
		)
	);
}

// Add new image sizes.
add_image_size( 'Blog Thumbnail', 162, 159, true );
add_image_size( 'store', 217, 312, true );

// * Reposition the post image (requires HTML5 theme support).
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
add_action( 'genesis_entry_header', 'genesis_do_post_image', 5 );

// Customize the Search Box.
add_filter( 'genesis_search_button_text', 'custom_search_button_text' );
function custom_search_button_text( $text ) {
	return esc_attr( __( 'Go', 'jessica' ) );
}

// Modify the author box display.
add_filter( 'genesis_author_box', 'jessica_author_box' );
function jessica_author_box() {
	$authinfo = '';
	$authdesc = get_the_author_meta( 'description' );

	if ( ! empty( $authdesc ) ) {
		$authinfo .= sprintf( '<section %s>', genesis_attr( 'author-box' ) );
		$authinfo .= '<h3 class="author-box-title">' . __( 'About the Author', 'jessica' ) . '</h3>';
		$authinfo .= get_avatar( get_the_author_meta( 'ID' ), 90, '', get_the_author_meta( 'display_name' ) . '\'s avatar' );
		$authinfo .= '<div class="author-box-content" itemprop="description">';
		$authinfo .= '<p>' . get_the_author_meta( 'description' ) . '</p>';
		$authinfo .= '</div>';
		$authinfo .= '</section>';
	}
	if ( is_author() || is_single() ) {
		echo $authinfo;
	}
}

// * Customize the entry meta in the entry header (requires HTML5 theme support).
add_filter( 'genesis_post_info', 'sp_post_info_filter' );
function sp_post_info_filter( $post_info ) {
	$post_info = '[post_date] [post_comments]';
	return $post_info;
}


// Customize the post meta function.
add_filter( 'genesis_post_meta', 'post_meta_filter' );
function post_meta_filter( $post_meta ) {
	if ( is_single() ) {
		$post_meta = '[post_tags sep=", " before="' . __( 'Tags:', 'jessica' ) . ' "] [post_categories sep=", " before="' . __( 'Categories:', 'jessica' ) . ' "]';
		return $post_meta;
	}
}

// Add Read More button to blog page and archives.
add_filter( 'excerpt_more', 'jessica_add_excerpt_more' );
add_filter( 'get_the_content_more_link', 'jessica_add_excerpt_more' );
add_filter( 'the_content_more_link', 'jessica_add_excerpt_more' );
function jessica_add_excerpt_more( $more ) {
	return '<span class="more-link"><a href="' . get_permalink() . '" rel="nofollow">' . __( '[Read More]', 'jessica' ) . '</a></span>';
}

/*
 * Add support for targeting individual browsers via CSS
 * See readme file located at /lib/js/css_browser_selector_readm.html
 * for a full explanation of available browser css selectors.
 */
add_action( 'get_header', 'jessica_load_scripts' );
function jessica_load_scripts() {
	wp_enqueue_script( 'browserselect', CHILD_URL . '/lib/js/css_browser_selector.js', array( 'jquery' ), '0.4.0', true );
}

// Structural Wrap.
add_theme_support(
	'genesis-structural-wraps', array(
		'header',
		'nav',
		'subnav',
		'site-inner',
		'footer-widgets',
		'footer',
	)
);


// Renames primary and secondary navigation menus.
add_theme_support( 'genesis-menus', genesis_get_config( 'menus' ) );

// * Add menu description.
add_filter( 'walker_nav_menu_start_el', 'be_add_description', 10, 2 );
function be_add_description( $item_output, $item ) {
	$description = $item->post_content;
	if ( ' ' !== $description ) {
		return preg_replace( '/(<a.*?>[^<]*?)</', '$1' . '<span class="menu-description">' . $description . '</span><', $item_output );
	} else {
		return $item_output;
	}
}

// * Remove the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );

// * Unregister Layouts.
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
genesis_unregister_layout( 'sidebar-content-sidebar' );

// * Add support for 3-column footer widgets.
add_theme_support( 'genesis-footer-widgets', 4 );

// Setup Sidebars.
unregister_sidebar( 'sidebar-alt' );

genesis_register_sidebar(
	array(
		'id'          => 'rotator',
		'name'        => __( 'Rotator', 'jessica' ),
		'description' => __( 'This is the image rotator section.', 'jessica' ),
	)
);
genesis_register_sidebar(
	array(
		'id'          => 'home-nav',
		'name'        => __( 'Home Categories Menu', 'jessica' ),
		'description' => __( 'This is the home middle navigation section.', 'jessica' ),
	)
);
genesis_register_sidebar(
	array(
		'id'          => 'home-cta-left',
		'name'        => __( 'Home CTA Left', 'jessica' ),
		'description' => __( 'This is the home call to action section.', 'jessica' ),
	)
);
genesis_register_sidebar(
	array(
		'id'          => 'home-cta-right',
		'name'        => __( 'Home CTA Right', 'jessica' ),
		'description' => __( 'This is the home call to action section.', 'jessica' ),
	)
);
genesis_register_sidebar(
	array(
		'id'          => 'home-mid-left',
		'name'        => __( 'Home Mid Left', 'jessica' ),
		'description' => __( 'This is the home middle section.', 'jessica' ),
	)
);
genesis_register_sidebar(
	array(
		'id'          => 'home-mid-right',
		'name'        => __( 'Home Mid Right', 'jessica' ),
		'description' => __( 'This is the home middle section.', 'jessica' ),
	)
);
genesis_register_sidebar(
	array(
		'id'          => 'home-bottom-ad',
		'name'        => __( 'Home Bottom Ad', 'jessica' ),
		'description' => __( 'This is the home page ad section.', 'jessica' ),
	)
);
genesis_register_sidebar(
	array(
		'id'          => 'bottom1',
		'name'        => __( 'Home Bottom 1', 'jessica' ),
		'description' => __( 'This is the before footer section.', 'jessica' ),
	)
);
genesis_register_sidebar(
	array(
		'id'          => 'bottom2',
		'name'        => __( 'Home Bottom 2', 'jessica' ),
		'description' => __( 'This is the before footer section.', 'jessica' ),
	)
);
genesis_register_sidebar(
	array(
		'id'          => 'bottom3',
		'name'        => __( 'Home Bottom 3', 'jessica' ),
		'description' => __( 'This is the before footer section.', 'jessica' ),
	)
);
genesis_register_sidebar(
	array(
		'id'          => 'bottom4',
		'name'        => __( 'Home Bottom 4', 'jessica' ),
		'description' => __( 'This is the before footer section.', 'jessica' ),
	)
);
genesis_register_sidebar(
	array(
		'id'          => 'blog-sidebar',
		'name'        => __( 'Blog Sidebar', 'jessica' ),
		'description' => __( 'This is the Blog Page Sidebar.', 'jessica' ),
	)
);
genesis_register_sidebar(
	array(
		'id'          => 'page-sidebar',
		'name'        => __( 'Page Sidebar', 'jessica' ),
		'description' => __( 'This is the Page Sidebar.', 'jessica' ),
	)
);
genesis_register_sidebar(
	array(
		'id'          => 'store-sidebar',
		'name'        => __( 'Store Sidebar', 'jessica' ),
		'description' => __( 'This is the Store Page Sidebar.', 'jessica' ),
	)
);

// Return the array of "homepage sidebars" for this theme

function jessica_get_homepage_sidebar_array() {
	return array(
		'rotator',
		'home-nav',
		'home-cta-left',
		'home-cta-right',
		'home-mid-left',
		'home-mid-right',
		'home-bottom-ad',
		'bottom1',
		'bottom2',
		'bottom3',
		'bottom4',
	);
}

// Remove edit link from TablePress tables for logged in users.
//add_filter( 'tablepress_edit_link_below_table', '__return_false' );

// * Insert SPAN tag into widgettitle.
add_filter( 'dynamic_sidebar_params', 'jessica_wrap_widget_titles', 20 );
function jessica_wrap_widget_titles( array $params ) {
	$widget                 =& $params[0];
	$widget['before_title'] = '<h4 class="widgettitle widget-title"><span class="sidebar-title">';
	$widget['after_title']  = '</span></h4>';

	return $params;
}

// Adds custom logo in Customizer > Site Identity.
add_theme_support( 'custom-logo', genesis_get_config( 'custom-logo' ) );

add_action( 'genesis_site_title', 'the_custom_logo', 0 );

// get_theme_mod( 'custom_logo' );.
if ( ! get_theme_mod( 'custom_logo' ) ) {
	if ( genesis_get_option( 'blog_title' ) == 'image' and ! get_theme_mod( 's9_has_title_setup' ) ) {

		$image         = get_stylesheet_directory() . '/images/logo.png';
		$wp_upload_dir = wp_upload_dir();
		$target_image  = $wp_upload_dir['path'] . '/s9_' . rand( 1, 10 ) . '_' . basename( $image );

		if ( file_exists( $image ) ) {
			$copy_image = copy( $image, $target_image );
		} else {
			$copy_image = false;
		}

		if ( $copy_image ) {
			$attachment = array(
				'guid'           => $wp_upload_dir['url'] . '/' . basename( $image ),
				'post_mime_type' => 'image/png',
				'post_title'     => 'logo',
				'post_content'   => 'logo',
				'post_status'    => 'inherit',
			);
			$image_id   = wp_insert_attachment( $attachment, $target_image );
			require_once ABSPATH . 'wp-admin/includes/image.php';
			$attach_data = wp_generate_attachment_metadata( $image_id, $target_image );
			wp_update_attachment_metadata( $image_id, $attach_data );
			set_theme_mod( 'custom_logo', $image_id );
		} else {
			add_action( 'admin_notices', 's9_failed_copy_notice' );
		}
	}
	set_theme_mod( 's9_has_title_setup', true );
}

// remove option logo header / logo text from genesis on customizer.
add_action( 'customize_register', 's9_theme_customize_register', 99 );
function s9_theme_customize_register( $wp_customize ) {
	$wp_customize->remove_control( 'blog_title' );
}

// remove opstion logo header / logo text from genesis options.
add_action( 'genesis_theme_settings_metaboxes', 's9_remove_logo_metaboxes' );
function s9_remove_logo_metaboxes( $_genesis_admin_settings ) {
	remove_meta_box( 'genesis-theme-settings-header', $_genesis_admin_settings, 'main' );
}

// show notice when logo failed to copy on upload folder.
function s9_failed_copy_notice() {
	echo '<div class="notice notice-error is-dismissible"><p>' . __( 'Failed to move site logo image, please upload your logo manually via appearance -> customise -> site identity', 'jessica' ) . '</p></div>';
}

// remove header-image body class.
add_filter( 'body_class', 'remove_header_image_class', 20, 2 );
function remove_header_image_class( $wp_classes ) {
	foreach ( $wp_classes as $key => $value ) {
		if ( $value == 'header-image' ) {
			unset( $wp_classes[ $key ] );
		}
	}

	return $wp_classes;
}

/**
 * No Header Right widget area
 *
 * @since 1.0.0
 * @param array $widgets
 * @return array $widgets
 */
function jessica_remove_header_right( $widgets ) {
	$widgets['header-right'] = array();
	return $widgets;
}

// load customizer.
require_once CHILD_DIR . '/lib/admin/customize.php';

// Determine what pages the "Blog Sidebar" should load on

function jessica_load_blog_sidebar() {
	// Legacy conditional check.  All these get the Blog Sidebar
	if( is_archive() || is_single() || is_category() || is_page_template( 'page_blog.php' ) ) {
		return true;
	}

	/*
	 * On the Page for Posts, get_the_id() will return the ID of the first post in the Loop, ***NOT***
	 * the ID of the Page itself, because reasons.  get_queried_object_id() will give us the _page's_
	 * ID.  Compare that to the page_for_posts option.  If they match, load the Blog Sidebar.
	 */

	$page_for_posts_id = (int) get_option( 'page_for_posts' );
	if( $page_for_posts_id !== 0 && ( $page_for_posts_id === get_queried_object_id() ) ) {
		return true;
	}

	// Everybody else gets the Page Sidebar
	return false;
}

function jessica_is_homewidget_active(){
	$active_homepage_sidebars = FALSE;
	$homepage_sidebars = jessica_get_homepage_sidebar_array();

	foreach( $homepage_sidebars as $homepage_sidebar ) {
		if( is_active_sidebar( $homepage_sidebar ) ) {
			$active_homepage_sidebars = TRUE;
		}
	}

	return $active_homepage_sidebars;
}


remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
remove_action('genesis_entry_footer', 'genesis_post_meta' );
remove_action('wp_head', 'wp_generator');
remove_action('genesis_entry_footer', 'genesis_post_meta' );


/**
* Change number of products that are displayed per page (shop page)
*/

add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );
function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options -> Reading
  // Return the number of products you wanna show per page.
  $cols = 30;

return $cols;
}

// Change the Number of Columns Displayed Per Page
add_filter( 'loop_shop_columns', 'lw_loop_shop_columns' );
function lw_loop_shop_columns( $columns ) {
 $columns = 5;
 return $columns;
}

/**
 * Change number of upsells output
 */
add_filter( 'woocommerce_upsell_display_args', 'wc_change_number_related_products', 20 );

function wc_change_number_related_products( $args ) {

 $args['posts_per_page'] = 5;
 $args['columns'] = 5; //change number of upsells here
 return $args;
}

add_filter('gettext', 'change_ymal');

function change_ymal($translated)
{
	//$translated = str_ireplace('', '', $translated);
	//$translated = str_ireplace('', '', $translated);
	//$translated = str_ireplace('', '', $translated);
	$translated = str_ireplace('Showing the single result', '', $translated);
	$translated = str_ireplace('Show more Posts', 'Show Next Products', $translated);
	$translated = str_ireplace('I have read and agree to the website', 'All items on website are custom printed to order – <strong>no returns or refunds on any items</strong>. Please review your items before placing your order. I have read and agree to the website', $translated);
	$translated = str_ireplace('You may also like', 'Suggested Items', $translated);
	$translated = str_ireplace('You may be interested in&hellip;', 'Recommended Items', $translated);
	return $translated;
}



add_filter('woocommerce_cross_sells_total', 'cartCrossSellTotal');
function cartCrossSellTotal($total) {
	$total = '4';
	return $total;
}

function schema_org_markup() {
    $schema = 'http://schema.org/';
    // Is single post
    if ( function_exists(is_woocommerce) && is_woocommerce() ) {
      $type = 'Product';
    }
    elseif ( is_single() ) {
        $type = "Article";
    }
    else {
        if ( is_page( 644 ) ) { // Contact form page ID
            $type = 'ContactPage';
        } // Is author page
        elseif ( is_author() ) {
            $type = 'ProfilePage';
        } // Is search results page
        elseif ( is_search() ) {
            $type = 'SearchResultsPage';
        } // Is of movie post type
        elseif ( is_singular( 'movies' ) ) {
            $type = 'Movie';
        } // Is of book post type
        elseif ( is_singular( 'books' ) ) {
            $type = 'Book';
        }
        else {
            $type = 'WebPage';
        }
    }
    echo 'itemscope="itemscope" itemtype="' . $schema . $type . '"';
}

add_action( 'wp_head', 'atlasws_schema' );
function atlaswsschema(){
	 schema_org_markup();
	 language_attributes();
}

/**
 * Auto Complete all WooCommerce orders.
 */
add_action( 'woocommerce_thankyou', 'custom_woocommerce_auto_complete_order' );
function custom_woocommerce_auto_complete_order( $order_id ) {
    if ( ! $order_id ) {
        return;
    }

    $order = wc_get_order( $order_id );
    $order->update_status( 'completed' );
}

?>