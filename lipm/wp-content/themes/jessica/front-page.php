<?php
/**
 * Jessica Front/Home page template for either widget based home page, or block based homepage.
 *
 * @package Jessica
 * @author  9seeds
 * @license GPL-2.0-or-later
 * @link    https://9seeds.com/
 */

/*
 * We want to load a widgetized home page if both are true:
 * 
 * 1) At least one homepage sidebar has a widget in it
 * 2) A static front page (Settings / Reading / Your homepage displays / A static page / Homepage ) is *not* set.
 *    Note: Static front pages should always take priority over widgets and Posts pages.
 * 
 * If both conditionals are true, load the widgetized version of the homepage.
 */

if( get_option( 'page_on_front' ) == 0 && jessica_is_homewidget_active() ) {
	jessica_do_widgetized_home();
} else {
	jessica_do_static_home();
}

/**
 * Fallback to page templates if home page set to static page
 * This is to allow for traditional templates and block based, or page builder based
 * Front Pages.
 *
 * @return void
 */
function jessica_do_static_home() {
	global $post;
	$template = get_page_template_slug( $post->ID );

	if ( ! empty( $template ) ) {
		switch ( $template ) {
			// Templates from Genesis parent folder.
			case 'page_archive.php':
			case 'page_blog.php':
				// check if template exist, if not render as widget home
				if(!empty(locate_template(get_template_directory() . '/' . $template))){
					load_template( get_template_directory() . '/' . $template );
					exit;
				}else{
					jessica_do_widgetized_home();
				}
			// Templates from Genesis child folder.
			default:
				// check if template exist, if not render as widget home
				if(!empty(locate_template(__DIR__ . '/' . $template))){
					load_template( __DIR__ . '/' . $template );
					exit;
				}else{
					jessica_do_widgetized_home();
				}
		}
	}
}

/**
 * Traditional Genesis Widget based Home Page output
 *
 * @return void
 */
function jessica_do_widgetized_home() {
	// default wp homepage.
	do_action( 'genesis_home' );

	// * Force full-width-content layout setting
	add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

	add_action( 'genesis_after_header', 'jessica_home_top' );

	// Remove the standard loop.
	remove_action( 'genesis_loop', 'genesis_do_loop' );

	// Execute custom child loop.
	add_action( 'genesis_loop', 'jessica_home_loop_helper' );

	add_action( 'genesis_before_footer', 'jessica_bottom_widgets', 5 );

}

/**
 * Jessica Home Top Widget Area Output
 *
 * @return void
 */
function jessica_home_top() {
	echo '<div class="home-top">';

	genesis_widget_area(
		'rotator', array(
			'before' => '<div class="home-slider"><div class="wrap">',
			'after'  => '</div></div>',
		)
	);
	genesis_widget_area(
		'home-nav', array(
			'before' => '<div class="home-mid-nav"><div class="wrap">',
			'after'  => '</div></div>',
		)
	);

	echo '</div>';
}

/**
 * Jessica Home Loop Helper
 *
 * @return void
 */
function jessica_home_loop_helper() {

	echo '<div class="home-cta">';

	genesis_widget_area(
		'home-cta-left', array(
			'before' => '<div class="home-cta-left widget-area">',
			'after'  => '</div>',
		)
	);
	genesis_widget_area(
		'home-cta-right', array(
			'before' => '<div class="home-cta-right widget-area">',
			'after'  => '</div>',
		)
	);
	
	echo '</div >';

	echo '<div class="home-mid">';

	genesis_widget_area(
		'home-mid-left', array(
			'before' => '<div class="home-mid-left widget-area">',
			'after'  => '</div>',
		)
	);
	genesis_widget_area(
		'home-mid-right', array(
			'before' => '<div class="home-mid-right widget-area">',
			'after'  => '</div>',
		)
	);

	echo '</div >';

	genesis_widget_area(
		'home-bottom-ad', array(
			'before' => '<div class="home-bottom-ad widget-area">',
			'after'  => '</div>',
		)
	);

}

/**
 * Jessica Home Bottom Widget Area Output
 *
 * @return void
 */
function jessica_bottom_widgets() {
	echo '<div class="bottom-widgets">';
	echo '<div class="wrap">';

	genesis_widget_area(
		'bottom1', array(
			'before' => '<div class="bottom1 widget-area">',
			'after'  => '</div>',
		)
	);
	genesis_widget_area(
		'bottom2', array(
			'before' => '<div class="bottom2 widget-area">',
			'after'  => '</div>',
		)
	);
	genesis_widget_area(
		'bottom3', array(
			'before' => '<div class="bottom3 widget-area">',
			'after'  => '</div>',
		)
	);
	genesis_widget_area(
		'bottom4', array(
			'before' => '<div class="bottom4 widget-area">',
			'after'  => '</div>',
		)
	);

	echo '</div >';
	echo '</div >';
}

genesis();