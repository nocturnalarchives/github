<?php
 /*
 Plugin Name: ATLASWS Private Plugin
 Plugin URI: http://awgr.com/wp-content/plugins/atlasws-private-plugin.zip
 description: ATLASWS Common Library Functions
 Version: 1.0.0.50
 Author:
 Author URI:
 */



//************************************************************************
// Table of Content
//
// 1.0 Variable Settings
//  1.1 Commmon Variables
//  1.2 Temporary Variables
//  1.3.0 Base Actions
//      1.3.1 WP Head Cleanup
//      1.3.2 Genesis Page Cleanup
//      1.3.3 Override Genesis Favicon
//  1.9.0 Include File Data
// 1.4.0 Set up image sizes
// 2.0.0 Library Functions
//  2.1.0 Main Functions Library
//      2.1.1 Get the domain
//      2.1.2 Register the names of the image sizes
// 2.2.0 Genesis Functions Library
//      2.2.1 Remove the H1 Page Title from Homepage
//      2.2.2 Change Author By Line and Post Date - Post Updated Section
//      2.2.3 Updates dates on old posts
//      2.2.4 Add The Featured Image to Single Post Pages
//      2.2.5 Displays the date in footer for spider and crawling tracking
//      2.2.6 Catch All to do all of the stuff we need to do in the Head
//      2.2.7 Custom Searchbar
//      2.2.8 Custom Shortcodes
//      2.2.9 Miscellaneous Code
// 2.3.0 Register Genesis Items
// 2.3.2 Register widgets
// 2.3.3 Override Gutenberg
// 2.9.0 Housekeeping functions
// 2.9.1 AutoptimizeCache Cleanup
// 3.0.0 AMP
//    3.1.0 AMP Filters & Actions
//    3.2.0 AMP Function Library
//    3.2.1 Add AMP Ad JS include
//    3.2.2 Add AMP Ad Adsense Under Featured Image
//    3.2.3 -  Add Google Adsense code to AMP within the content at multiple place*/
// 4.0.0 Domain Dependant Coding
//    4.0.1 Domain Tests
//    4.0.2 Google Tag Manager Code
//    4.0.3 Woo Commerce
//************************************************************************

// 1.0 Variable Settings /

// 1.1 Commmon Variables /
$aws_debug_flag = false; //global debug flag
//$aws_debug_flag = true; //enable the global debug flag
$aws_domain = aws_the_domain(get_option('siteurl'), $debug_flag); //get the base domain
$aws_gtm = ""; // if $aws_domain has a GTM ID (4.0.1) we will include the Tag Manager Code (4.0.2)
$featured_off = false; //disable featured images on domain level
$GLOBALS['aws_nav_search'] = false; // do we include a search bar in the main nav menu - set by domain in website-data.php
$GLOBALS['aws_nav_search_icon'] = false; // do we change the search button to an icon - set by domain in website-data.php
$GLOBALS['aws_arch_flag'] = false; //when we do a date update do we want to trigger the minor edits plugin to re-archive the post
$GLOBALS['aws_meta_info_disp'] = false; // This flag determeines whether we are turning off the post meta info
$GLOBALS['aws_home_frequent'] = false; // This flag determeines if the homepage updtate date is updated more frequently or not

// 1.2 Temporary Variables /
$aws_temp_domain_on = array('example1.com','example2.com'); //temporary array to turn on
$aws_temp_domain_off = array('example1.com','example2.com'); //temporary array to turn off

// 1.3.0 Base Actions /

// 1.3.1 WP Head Cleanup
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0); // Removes the WP-Shortlinks from the <head>
remove_action('wp_head', 'wp_generator'); // Removes the WP Version from the <head>



// 1.3.2 Genesis Page Cleanup
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head'); // Removes the adjacent posts from the <head>
remove_action( 'genesis_entry_footer', 'genesis_post_meta' ); // Removes the categories and tags links from after the posts
add_action( 'get_header', 'header_functions' ); //remove title from front page
add_action( 'genesis_entry_header', 'add_post_info_pages' ); // Change Author By Line and Post Date - Post Updated Section
add_filter('genesis_after_loop','post_updater'); // Checks to see if we need to run the post date update routine 2.2.3
add_action( 'genesis_entry_header', 'single_post_featured_image', 15 ); // Adds the featured image to Single Post Pages 2.2.4
//add_action( 'genesis_entry_footer', 'atlasws_meme_function' ); // If this is a a meme post type display notices and do post hygenie 2.3.4
add_shortcode('datefoot', 'displaydate'); // displays todays date in the footer 2.2.5
remove_action('welcome_panel', 'wp_welcome_panel'); // Remove WP Welcome Panel

// 1.3.2 Override Genesis Default Favicon
/** Adding custom Favicon */
add_filter( 'genesis_pre_load_favicon', 'custom_favicon' );
function custom_favicon( $favicon_url ) {
	return ''. trailingslashit( get_bloginfo('url') ) .'favicon.ico';
}

if($GLOBALS['defaultfilssizes']){
	// These are cropped image sizes
	add_image_size( 'home-top', 750, 420, true );
	add_image_size( 'large-rectangle', 600, 336, true );
	add_image_size( 'med-rectangle', 400, 245, true );
	add_image_size( 'small-rectangle', 300, 185, true );
	add_image_size( 'c-square-1', 250, 250, true );
	add_image_size( 'thumbnail', 150, 150, true );
	add_image_size( 'sm-thumbnail', 100, 100, true );
	// These are uncropped image sizes
	add_image_size( 'r-uncropped1', 800, 800, false );
	add_image_size( 'r-uncropped2', 700, 700, false );
	add_image_size( 'r-uncropped3', 600, 600, false );
	add_image_size( 'r-uncropped4', 500, 500, false );
	add_image_size( 'square-1', 400, 400, false );
	add_image_size( 'square-2', 300, 300, false );
	add_image_size( 'square-3', 200, 200, false );
}


add_filter( 'image_size_names_choose', 'atlasws_custom_sizes' ); // 2.1.2 Register the image sizes for use in Add Media modal

//  1.9.0 Include File Data
// fold
include "website-data.php";
//include 'custom-taxonomy.php';
require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'http://awgr.com/wp-content/plugins/atlasws-private.json',
	__FILE__, //Full path to the main plugin file or functions.php.
	'atlasws-private-plugin'
);
// endfold


// 2.0 Library Functions

// 2.1.0 Main Functions Library

// 2.1.1 Get just the domain */
function aws_the_domain($the_domain, $aws_debug_flag){
    $the_domain = str_replace('http://', '', $the_domain); //Strip "http://"
    $the_domain = str_replace('https://', '', $the_domain); //Strip "https://
    $the_domain = str_replace('www.', '', $the_domain); //Strip "www."
    $the_domain = str_replace('/', '', $the_domain); //Strip trailing "/"
    $the_domain = strtolower($the_domain); //convert to all lowercase
    if ($aws_debug_flag){echo "<br />aws_domain:".$the_domain;} // debug echo to screen
    return $the_domain;
}

// 2.1.2 Register the image sizes for use in Add Media modal
function atlasws_custom_sizes( $sizes ) {
	//if($GLOBALS['defaultfilesizes']){
    return array_merge( $sizes, array(

        'home-top' => __( 'Home Top' ),
				'large-rectangle' => __( 'Large Rectangle' ),
				'med-rectangle' => __( 'Medium Rectangle' ),
				'small-rectangle' => __( 'Small Rectangle' ),
				'c-square-1' => __( 'Cropped Square' ),
				'thumbnail' => __( 'Thumbnail' ),
				'sm-thumbnail' => __( 'Small Thumbnail' ),
				'r-uncropped1' => __( 'Uncropped 1' ),
				'r-uncropped2' => __( 'Uncropped 2' ),
				'square-1' => __( 'Uncropped Square 1' ),
				'square-2' => __( 'Uncropped Square 2' ),
				'square-3' => __( 'Uncropped Square 3' )
    ) );
	//}
}


// 2.2.0 Genesis Functions Library

// 2.2.1 Remove the H1 Page Title from Homepage
function remove_page_title() {
    if ( is_front_page()  ) {
        remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
    }
}

// 2.2.2 Change Author By Line and Post Date - Post Updated Section
function add_post_info_pages() {
	if ( is_front_page() ) {
			$post_info = '[post_date] [post_edit]';
			//$post_info = '[post_date] ' . __( 'by', 'genesis' ) . ' [post_author]  [post_edit]';
			echo '<div class="updated">Page Updated '.do_shortcode( $post_info ) . '</div>';
	}
}

// 2.2.3 Single Post Processing and Updates dates on old posts
//posts with 'nupd' tag do not get Updated
//posts with 'review' tag get updated after 90 days old
//posts with 'cy' tag move into current year after Jan 21
//posts with a last modified time after the published date get updated to last modified time
//if the post ID for the Homepage, if last modified of current page is newer than homepage update homepage
//override the agesetting for GraywolfSEO.com, SevenPack.net to 18 months
//updates dates on old posts
function post_updater($aws_debug_flag){
	//check if we are turning of the display of the post meta info
	if ($GLOBALS['aws_meta_info_disp']){ //check the flag
		If (is_single()) { //check if single post
			if (!has_tag('dispmeta')){
				// The default setting turn off display of the post meta info the tag is an override
				echo"<style>.entry-title, .breadcrumb, .updated,.entry-meta{display:none;}</style>";
			}
		}
	}




	$aws_debug_flag = false;
	$uudate = false;
	$cyear = false; //keeps the post in the current year
	$cmonth = false; //keeps the post in the current month
	$umod = false; //flag to change post time time to last updated time
	$uhpmod = false; //flag to change post time time to last updated time
	$hp_upd_time = ""; //homepage last update time
	$hp_upd = false; //do we update the HP last modified time
	$frontpage_id = get_option('page_on_front'); //get the ID of the front page
	//$table_pre = $wpdb->get_blog_prefix(0); // wp_posts or wp_2_posts so on..
	global $id, $wpdb; // gets the global variables
	$table_pre = $wpdb->prefix ; // gets the prefix for the WP tables
	$p_table = $table_pre . "posts"; // builds tha name of the posts table
	$oold = 180; //this is the maximum days old a post can be
	$daysold = (current_time(timestamp) - get_the_time('U') - (get_settings('gmt_offset')))/(24*60*60); //how many days old is this post
	$postdate = date("F d, Y",get_the_time('U')); //converts the post date to M-D-Y format
	$u_modified_time = get_the_modified_time('U'); // gets the post last modified time
	$u_post_time = get_the_time('U'); // gets the post published time
	$hp_upd_time = get_post_modified_time( "U", false, $frontpage_id, false ); // what is the last modified time of the homepage
	if ($u_modified_time > $hp_upd_time){$hp_upd = true;} // if the homepage last modified time is earlier than the last modified time of this post we're going to update the last modified time for the homepage
	$aws_temp_domain = get_option('siteurl'); //get the base domain
	$aws_temp_domain = str_replace("http://","",$aws_temp_domain); //strip out http://
	$aws_temp_domain = str_replace("https://","",$aws_temp_domain); //strip out https://
	$aws_temp_domain = str_replace("www.","",$aws_temp_domain); //strip out www.
	$atlasws_bdate = false; //are we backdating this post
	$atlasws_bdate_mod = 1; //this is the bdate modifier, if we are doing the voodoo it gets set to -1
	$atlaswsfd = 0; //this controls the number of days forward we are moving a post
	$atlasws_overdate = ""; // this is the override date we're going to set the post to
	$dayv = 86400; //one day in unix time
	$ptype = ""; //sets post type to nothing.
	$short_home_age = 9; // if the frequenty upstaed homepage flag exist this is the max age

	//this turns on the display for debug information
	//$aws_debug_flag = true;


	if (has_tag('cy')){$cyear = true;} //this keeps all posts with 'cy' tag in the current year
	if (has_tag('cm')){$cmonth = true;} //this keeps all posts with 'cm' tag in the current year
	if (has_tag('review')){ $oold=90;} //review tag keeps posts less than 90 days old
	if (has_tag('upds')){ $oold=90;} // The 'upds' tag keeps the post less than 90 days old
	if (has_tag('updt')){ $oold=30;} // The 'updt' tag keeps the post less than 30 days old
	If (is_front_page() OR is_home()) {//check to see if it's the homepage
		$oold = 90; //this is the maximum age for the front page
		if($GLOBALS['aws_home_frequent']){ //check to see if we keep homepage newer
			$oold = $short_home_age; //this is the maximum age for the front page
		}
		$cyear = true; // if this is the homepage it sets the current year flag to be true
	}


	// These Domains allow posts to be 18 months old
	$aws_long_domains = array("graywolfseo.com", "sevenpack.net");
	if (in_array($aws_temp_domain, $aws_long_domains)) {
    $oold = 540; // Max age override to 18 months
	}

	// This activates on the CM tag (Current month) it keeps posts in the current month after the 11th day
	if($cmonth){ //is the keep in current month flag true
		if(date(j)>7){ //wait until after the 7th day of the month
			//this makes sure we don't accidentally future date a post
			if($daysold >7){ //check to see if the post is more than 10 days old
				$uudate = true; //flag to say we're doing a date update
				$oold = 6; //maximum number of days we can add
			}
		}
	}


	if ($cyear){ // checks to see if the post has the 'cyear' flag, this means the post must be in the current year.
		$cy = date(Y); // sets 'cy' to the current year
		$py = substr($postdate,-4); // sets 'py' to the year of the post -4 days to give us some padding.
		If ($py != $cy){ // check to see if the post year is not equal to the current year, if it's not we need to update it
			If (date(M) != "Jan"){ // if the current month is not January we can bump the date by up to 10 days
				$oold=10;	// We can bump the days by up to 10 days
			}else{ // if the current month is January we won't bump the date until we are into the month
				If(date(j)>20){ // If it is January we have to wait until after the 20th to bump the date
					$oold=7; // We can bump the days by up to 7 days
				}
			}
		}
	}

	//get the ATLASWS variable from the Query string if it 8675309 then set up the backdate values
	if ($_GET["atlasws"] == "8675309"){ // does the URL have this parameter ?atlasws=8675309
		$atlasws_bdate = true; //set the flag so we know we're backdating
		$atlasws_bdate_mod = -1; //setting this to -1 means we are subtracting days not adding them
		$uudate = true; //flag to say we're doing a date update
		$umod = false; //we are ignoring the last modified date
		$oold = 150; //maximum number of days we are going back
	}

	// the $atlasfd tells how many days back from today
	if ($_GET["atlaswsfd"] <> ""){ // does the URL have this parameter ?atlaswsfd=XXX
		$atlaswsfd = $_GET["atlaswsfd"]; // get the parameter
		if(is_numeric($atlaswsfd)){ // check to make sure it's a number
			if($atlaswsfd > 30){$atlaswsfd = 30;} //max
			$uudate = true; //flag to say we're doing a date update
			$umod = false; //we are ignoring the last modified date
			$atlasws_overdate = current_time(timestamp) - ($atlaswsfd * $dayv); // take the current day and subtract back however many days
		}


		if ($aws_debug_flag){echo "<br>atlaswsfd: ".$atlaswsfd;} // debug information
		if ($aws_debug_flag){echo "<br>Current: ".current_time(timestamp);} // debug information
		if ($aws_debug_flag){echo "<br>atlasws_overdate: ".$atlasws_overdate;} // debug information
	}

	$ptype = get_post_type(); //get the current post type


	If (is_front_page()) {$uudate = true;} // if this is the homepage we can check if the post needs to be updated.
	If (is_single()) {$uudate = true;} //if this is a single post page we can check if the post needs to be updated.
	if ($ptype = "mememe") {$uudate = true;} //if this is a meme post  we can check if the post needs to be updated.
	if ($u_modified_time >> $u_post_time AND $atlasws_bdate == false){$uudate = true;$umod = true;} // if the last modified time is later we can check if the post needs to be updated.

	// debug information
	if ($aws_debug_flag){
		echo "<br>Postdate: ".$postdate;
		echo "<br>";
		echo "Daysold ".$daysold;
		echo "<br />oold ".$oold;
		echo "<br />u_modified_time: " . $u_modified_time;
		echo "<br />u_post_time: ". $u_post_time;
		echo "<br />Home Page Post ID: ". $frontpage_id;
		echo "<br />Home Page update time: ". $hp_upd_time;
		echo "<br />Home Page Update: ". $hp_upd;
		echo "<br />Table Prefix: ". $table_pre;
		echo "<br />Posts Table: ". $p_table;
		echo "<br />Post Type: ". $ptype;
		echo"<br>Post Year: ".$py;
		echo"<br>Current Year: ".$cy;
		echo"<br>umod: ".$umod;
		echo"<br>uudate: ".$uudate;
	}





	if ($uudate) { // checks to see if we're allowed to update this post.
		if ($daysold > $oold OR $umod == true OR $atlasws_bdate == true OR $atlasws_overdate > 0 ){ // if this post is older than the maximum days old or the last modified time is later we're going to do an update
			if (!has_tag('nupd')){ // the NUPD tag says don't do an update
				$nd = get_the_time('U'); //get the current date unix time format
				if ($aws_debug_flag){echo "<br>nd: ".$nd;} // debug information
				$today = getdate($nd);//create an array with the date/time values
				$dd = rand(1,($oold)); // get a random number of days between 1 and max days
				if ($aws_temp_domain=="graywolfseo.com"){$dd = 90;} // special handling
				if ($aws_debug_flag){echo "<br>dd: ".$dd;} // debug information
				$randv = $dd * 86400; //convert random time to unix time
				if ($aws_debug_flag){echo "<br>new nd: ".$nd;} // debug information
				if ($aws_debug_flag){echo "<br>randv: ".$randv;} // debug information
				if ($aws_debug_flag){echo "<br>atlasws_bdate_mod: ".$atlasws_bdate_mod;}// debug information
				$nd = $nd + ($randv*$atlasws_bdate_mod); // add/subtract the random number of days to original post date
				if ($umod AND $atlasws_bdate == false){
					$nd = $u_modified_time; //if the last modified time is newer than the post date use the last modified time
					if ($aws_debug_flag){echo "<br>new nd: ".$nd;} // debug information
				}	// set the new time to be the last modified time
				if($atlasws_overdate > 0){ $nd = $atlasws_overdate;} // if the override date exists use it
				$today = getdate($nd); //set up an array of time date values

				//write the new date to the database
				global $id, $wpdb; //get postid, and set up WP db connection
				//extract and build new timestamp from array
				$new_time = $today[year].'-'.$today[mon].'-'.$today[mday].' '.$today[hours].':'.$today[minutes].':'.$today[seconds].'';
				if ($aws_debug_flag){echo "<br>NT: ".$new_time;}
				$post_id = $id; //post_id
				$querystr = "UPDATE ".$p_table." SET post_date = '".$new_time."' WHERE ID = '".$post_id."'"; //build querystring makes debugging easier
				if ($aws_debug_flag){echo "<br>querystr ".$querystr;}
				$wpdb->query($querystr); //update the db for post date
				$querystr = "UPDATE ".$p_table." SET post_modified = '".$new_time."' WHERE ID = '".$post_id."'";  //build querystring makes debugging easier
				if ($aws_debug_flag){echo "<br>querystr ".$querystr;}
				$wpdb->query($querystr); //update the db for post_modified
				$querystr = "UPDATE ".$p_table." SET post_modified_gmt = '".$new_time."' WHERE ID = '".$post_id."'";  //build querystring makes debugging easier
				if ($aws_debug_flag){echo "<br>querystr ".$querystr;}
				$wpdb->query($querystr); //update the db post_modified_gmt

				// this is the code that decides if we want to try and re-archive the post
				//if ($GLOBALS['aws_arch_flag'] ){ // if the archive flag is set add to the post and trigger the minor updates plugin to activate
					//$content_post = get_post($post_id); //set up to get content
					//$aws_temp_content  = get_post_field('post_content', $post_id); // get the content
					//$aws_temp_content  = str_replace("          ","",$aws_temp_content); //if we have 10 spaces at the end clean them to to keep things from becoming a mess;
					//$aws_temp_content = $aws_temp_content. "     "; // add 5 spaces onto the end.
					//$querystr = "UPDATE ".$p_table." SET post_content = ".$aws_temp_content." WHERE ID = '".$post_id."'";  //build querystring makes debugging easier
					//if ($aws_debug_flag){echo "<br>querystr ".$querystr;}
					//$wpdb->query($querystr); //update the db post_modified_gmt
				//}



				if ($hp_upd){ // Do we need to update the Homepage times
					$post_id = $frontpage_id; //post_id

					$querystr = "UPDATE ".$p_table." SET post_date = '".$new_time."' WHERE ID = '".$post_id."'"; //build querystring makes debugging easier
					if ($aws_debug_flag){echo "<br>querystr ".$querystr;}
					$wpdb->query($querystr); //update the db
					$querystr = "UPDATE ".$p_table." SET post_modified = '".$new_time."' WHERE ID = '".$post_id."'"; //build querystring makes debugging easier
					if ($aws_debug_flag){echo "<br>querystr ".$querystr;}
					$wpdb->query($querystr); //update the db
					$querystr = "UPDATE ".$p_table." SET post_modified_gmt = '".$new_time."' WHERE ID = '".$post_id."'"; //build querystring makes debugging easier
					if ($aws_debug_flag){echo "<br>querystr ".$querystr;}
					$wpdb->query($querystr); //update the db




				}
			}
		}
  }
}

// 2.2.4 Add The Featured Image to Single Post Pages
function single_post_featured_image() { // Add the Featured Image on single post pages
	if (!$GLOBALS['featured_off']){
		if (!has_tag('nofeat')){ // no featured image if the 'nofeat' tag is used
			if (!is_singular( 'post' ) )
				return;
				$img = genesis_get_image( array( 'format' => 'html', 'size' => genesis_get_option( 'image_size' ), 'attr' => array( 'class' => 'post-image' ) ) );
				printf( '<a href="%s" title="%s">%s</a>', get_permalink(), the_title_attribute( 'echo=0' ), $img );
			}
		}
}

// 2.2.5 Displays the date in footer for spider and crawling tracking
function displaydate(){ // displays todays date in the footer
	return date('Y-M j');
	if($GLOBALS['additionalcss'] != ""){displayadditionalcss();}
}

// 2.2.6 Takes care of things we need to do in the head of the post
function header_functions(){
	remove_page_title(); //remove the front page title
	$aws_domain = aws_the_domain(get_option('siteurl'), $debug_flag); //get the base domain

	//turn off featured image CookingHacks Reviews Category
	if ($aws_domain == "cookinghacks.com" ){
		if ( has_category('Reviews')){
			$GLOBALS['featured_off'] = true; //turn off the featured images at the domain level
		}
	}

}

// 2.2.7 if the flags are set add search to the main nav and change search button to an icon
// Add a Search Bar to PRIMARY Navigation Menu
if ($GLOBALS['aws_nav_search']){
	add_filter( 'wp_nav_menu_items', 'theme_menu_extras', 10, 2 );
	function theme_menu_extras( $menu, $args ) {
	if ( 'primary' !== $args->theme_location )
		return $menu;
		$menu  .= '<li class="search-bar">' . get_search_form( false ) . '</li>';
		return $menu;
	}
}
//add this to CSS FILE
//* Adjustment to Optimize Search Bar in Header Menu */
//.genesis-nav-menu>.search-bar, .nav-primary {float: right;}
//.site-header .search-form {width: 100%;border-radius: 35px;}
//@media only screen and (max-width: 1023px) {.genesis-nav-menu > .search-bar {float: left;}


//* Add Dashicon to search form button
if ($GLOBALS['aws_nav_search_icon']){
	add_filter( 'genesis_search_button_text', 'wpsites_search_button_icon' );
	function wpsites_search_button_icon( $text ) {
		return esc_attr( '&#xf179;' );
	}
	add_filter( 'genesis_search_text', 'wpsites_icon_inside_input' );
	function wpsites_icon_inside_input( $text ) {
		return esc_attr( '&#xf179;' );
	}
}
//add this to CSS FILE
// .search-form input[type="submit"] {content: "\f179";display: inline-block;-webkit-font-smoothing: antialiased;font: normal 30px/1 'dashicons';vertical-align: middle;background: none;border: none;padding-left: 5px;width:25px;}

// 2.2.8 custom shortcodes

//[post_published] shortcode to display post published date
function post_published_date(){
 return get_the_date();
}
add_shortcode( 'post_published', 'post_published_date' );

//display link to autoupdate page date if user is logged in
// Add Shortcode [update_post_date]
function display_date_update_link() {
	if ( is_user_logged_in() ) { //is the user logged in
		$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; //set the ful URL
		$actual_link = str_replace('?atlaswsfd=1', '', $actual_link);	//strip out potential duplicate parametrs
		$str = "(<a href='".$actual_link."?atlaswsfd=1'>Update Post Date</a>)";	// build a string with the HTML
	}
	if(has_category('Legal Pages')){
	  $str = "<style>.entry-title, .breadcrumb, .updated,.entry-meta{display:none;}</style>";
	}
	return $str; //send it back to through the function
}
add_shortcode( 'update_post_date', 'display_date_update_link' );



// 2.2.9 miscellaneous code
// Content Views Pro - get term image from ACF
add_filter( 'pt_cv_term_thumbnail', 'cvp_theme_term_thumbnail_acf', 100, 2 );
function cvp_theme_term_thumbnail_acf( $thumb, $term ) {
	$field	 = get_field( 'category_image', $term );
	$thumb	 = '<img src="' . $field[ 'url' ] . '" />';
	return $thumb;
}


// If it's Dissenter Gab website then do the redirect
$aws_debug_flag = false; // decide if we're displaying debug information
$adversarial_redirect = false; //Use this as a flag to decide if we're doing an adversarial redirect or not.
$referral = $_SERVER['HTTP_REFERER']; // Get the Server Variable
$aws_user_agent = " ".$_SERVER['HTTP_USER_AGENT']; //get the user agent
$referral = strtolower($referral); //covert it all to lowercase
$referral = explode ("/", $referral); //split it into parts
$referral = $referral[2]; //use just the root domain
$adversarial_url = "https://pastebin.com/8RqfzL75"; //this is the default URL
//$aws_debug_flag = true; // turn this on to display debug information


//list of bad sites to do the redirect on
if ( $referral == 'dissenter.com'){ $adversarial_redirect = true; }  //if you came from dissenter you are a bad hombre

// check for bad bots
$aws_search = 'cortex'; //This is the Dissenter.com Spider
if(preg_match("/{$aws_search}/i", $aws_user_agent)) {$adversarial_redirect = true;} // if you match you get sent away

//Display The Debug Information
if ($aws_debug_flag){echo "<br>Referrer ".$referral;}
if ($aws_debug_flag){echo "<br>Adversarial Redirect ".$adversarial_redirect;}
if ($aws_debug_flag){echo "<br>User Agent ".$aws_user_agent;}

// are we sending you away
if ($adversarial_redirect == true){
	if ($GLOBALS['adversarial_redirect_url'] != ""){$adversarial_url = $GLOBALS['adversarial_redirect_url'];} //override the URL
	header("Location: ".$adversarial_url);  //do the redirect
}


// 2.3.0 Register Genesis Items

// 2.3.1 Register Full Width Footer Area
add_theme_support ( 'genesis-­menus' , array (
'primary' => 'Primary Navigation Menu' ,
'secondary' => 'Secondary Navigation Menu' ,
'footer' => 'Footer Navigation Menu'
) );
function register_additional_genesis_menus() {
register_nav_menu( 'footer' ,
__( 'Footer Navigation Menu' ));
}
add_action( 'after_setup_theme', 'register_additional_genesis_menus' );
add_action('genesis_before_footer', 'wdm_add_footer_menu');
function wdm_add_footer_menu()
{
    wp_nav_menu(array(
     'sort_column' => 'menu_order',
     'container_id' => 'footer' ,
     'menu_class' => 'menu-tertiary',
     'theme_location' => 'footer',
     'depth' => 1,
     'items_wrap'  => '<ul id="%1$s" class="%2$s">%3$s</ul>'
      ) );
 }

// 2.3.2 Register Banner Above Header
//* Hook before header widget area before site header
add_action( 'genesis_before_content_sidebar_wrap', 'bg_after_header_widget_area' );
function bg_after_header_widget_area() {
	genesis_widget_area( 'after-header', array(
		'before' => '<div class="after-header widget-area"><div class="wrap">',
		'after'  => '</div></div>',
	) );
}

register_sidebar( array(
  	'id'          => 'after-header',
	'name'        => __( 'After Header', 'theme-name' ),
	'description' => __( 'This is the after header widget area.', 'theme-name' ),
) );


// 2.3.3 Override Gutenberg Editor
add_filter('use_block_editor_for_post', '__return_false', 10);

//2.3.4 Parody Notice Display Check
function atlasws_meme_function(){
	function dupe_mememe_list_cateogries( $id, $taxonomy = 'mememe_category' ) {

			$catlist = '';
			$catclass = '';
			$catresult = false;

			if ( $id ) {
				$terms = get_the_terms( $id, $taxonomy );
				if ( $terms && ! is_wp_error( $terms ) ) {
					$catlist = '<ul class="mememe-cat-list">';
					foreach ( $terms as $term ) {
						$catclass .= ' mememe-filter-' . $term->slug;
						$term_link = get_term_link( $term );
						$catlist .= '<li><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></li>';
					}
					$catlist .= '</ul>';
					$catresult = array(
						'list' => $catlist,
						'classes' => $catclass,
					);
				}
			}
			return $catresult;
		}

	if($GLOBALS['parody_notice_check'] ){
		// Set the base variables
		$post_is_meme = false;
		$display_parody_notice = false;
		$display_nonparody_notice = false;
		$display_hatespeech_notice = false;
		$display_freespeech_notice = false;
		$check_seo_description = false;
		$update_not_parody = false;
		$real_quote = false;
		$fix_url_slug = false;
		$atlasws_temp_table = "wp_postmeta";
		$aws_domain = aws_the_domain(get_option('siteurl'), $debug_flag); //get the base domain

		// Get the base URL for the link to the disclaimer pages
		global $wp;
		$current_url = add_query_arg( $wp->query_string, '', home_url( $wp->request ) );

		// Check for "meme" "mememe" or parody tags
		if(strpos($current_url,"mememe")){$display_parody_notice = true;$post_is_meme = true;}
		if(strpos($current_url,"meme")){$display_parody_notice = true;$post_is_meme = true;}
		if (has_tag('pfoot')){$display_parody_notice = true;}
		if (has_tag('parody')){$display_parody_notice = true;}

		// Check for non parody tags
		if (has_tag('notparody')){$display_nonparody_notice = true;}
		if (has_tag('nonparody')){$display_nonparody_notice = true;}
		if (has_tag('noparody')){$display_nonparody_notice = true;}

		 global $id, $wpdb;
		 $list_categories = dupe_mememe_list_cateogries( $id, 'mememe_category' );
		 $maxcount = count($list_categories);

		 include "include-h-sppech-match.php";

		 foreach($list_categories as $result) {

			if (preg_match($hsppech_check, $result)){$display_hatespeech_notice = true;}

			// IF IT'S IN THE QUOTE CATEGORY IT'S NOT A PARODY
			if (strpos($result,"quote")){$display_nonparody_notice = true; $real_quote = true;}
		}

		// If Not Parody flag is set turn off parody flag
		if($display_nonparody_notice){$display_parody_notice = false;}

		// Display the parody notice
		if($display_parody_notice == true){
			if ($GLOBALS['archive_website'] == true){
				echo "<br /><p class='parody-notice parody-colors'>This page includes archived parody content, please see our <a href='".get_option('siteurl')."/parody-disclaimer/#parodyarchive'>Parody Disclaimer</a> for more information.</p>";

			}else{
				echo "<br /><p class='parody-notice parody-colors'>This page includes parody content, please see our <a href='".get_option('siteurl')."/parody-disclaimer/#parody'>Parody Disclaimer</a> for more information.</p>";
			}
		}

				// Display the nonparody notice
		if($display_nonparody_notice == true){
			if ($real_quote == true){
				echo "<br /><p class='parody-notice nonparody-colors'>This page includes real quote and <strong><em>IS NOT</em></strong> parody content, please see our <a href='".get_option('siteurl')."/parody-disclaimer/#quote'>Parody Disclaimer</a> for more information.</p>";
			}else{
				echo "<br /><p class='parody-notice nonparody-colors'>This page includes real information and <strong><em>IS NOT</em></strong> parody content, please see our <a href='".get_option('siteurl')."/parody-disclaimer/#real'>Parody Disclaimer</a> for more information.</p>";
			}
		}

		 if ($display_hatespeech_notice == true){
			echo "<br /><p class='hatespeech-notice nonparody-colors'>Parody Or Satire content about a religion, race, or gender <strong><em>IS NOT Hate Speech</em></strong>, and is protected by the First Amendment, please see our <a href='".get_option('siteurl')."/parody-disclaimer/#hatespeech'>Parody Disclaimer</a> for more information.</p>";
		 }

		// CHECK THE SEO DESCRIPTION IF IT'S BLANK COPY THE TITLE
		if($post_is_meme == true){
			//FIRST WE CHECK THE SEO META DESCRIPTION
			global $wpdb,$atlasws_temp_table;
			$temp_query = "SELECT meta_value FROM wp_postmeta WHERE (post_id = '".$id."' AND meta_key = '_yoast_wpseo_metadesc') ";
			//echo "<br />Query: ".$temp_query;
			$temp_desc = $wpdb->get_var($temp_query);
			//echo "<br /><strong>Gets here: </strong> ".$temp_desc;
			if($temp_desc == ""){
				// IT'S EMPTY SO GO GET THE VALUE FROM THE TITLE
				$temp_query_2 = "SELECT post_title FROM wp_posts WHERE id = '".$id."'  ";
				//echo "<br />Query: ".$temp_query_2;
				$temp_title = $wpdb->get_var($temp_query_2);
				//echo "<br />title ".$temp_title;
				$temp_query_3 = "SELECT count FROM wp_postmeta WHERE (post_id = '".$id."' AND meta_key = '_yoast_wpseo_metadesc') ";
				$temp_count = $wpdb->get_var($temp_query_3);
				//echo "<br />Count: ".$temp_count;
				if($temp_count == ""){
					$querystr = "INSERT into wp_postmeta  (meta_value, post_id ,  meta_key ) values ('".$temp_title."', '".$id."',  '_yoast_wpseo_metadesc' )";  //build querystring makes debugging easier
				}else{
					$querystr = "UPDATE wp_postmeta SET meta_value = '".$temp_title."' WHERE (post_id = '".$id."' AND meta_key ='_yoast_wpseo_metadesc' )";  //build querystring makes debugging easier
				}
				if ($aws_debug_flag){echo "<br>querystr ".$querystr;}
				$wpdb->query($querystr); //update the db
			}
			//NOW WE CHECK THE POST SLUG
			$slug_update  = false;
			//$aws_debug_flag = true;
			$temp_query = "SELECT post_name FROM wp_posts WHERE (ID = '".$id."') ";

			if ($aws_debug_flag){echo "<br>querystr ".$$temp_query;}
			$temp_slug = $wpdb->get_var($temp_query);
			if ($aws_debug_flag){echo "<br>slug ".$temp_slug;}
			$temp_slug ="xxx-".$temp_slug."-xxx";
			if (strpos($temp_slug,"-meme")){ $temp_slug = str_replace("-meme-","",$temp_slug);$slug_update  = true;}
			if (strpos($temp_slug,"-mememe")){ $temp_slug = str_replace("-mememe-","",$temp_slug);$slug_update  = true;}
			if (strpos($temp_slug,"-mmee")){ $temp_slug = str_replace("-mmee-","",$temp_slug);$slug_update  = true;}

			$temp_slug = str_replace("xxx-", "", $temp_slug);
			$temp_slug = str_replace("-xxx", "", $temp_slug);
			$temp_slug = str_replace("xxx", "", $temp_slug);

			if($slug_update  == true){
				$querystr = "XXX UPDATE wp_posts SET post_name = '".$temp_slug."' WHERE (ID = '".$id."' )";  //build querystring makes debugging easier
				if ($aws_debug_flag){echo "<br>querystr ".$querystr;}
				$wpdb->query($querystr); //update the db
			}


			// SPECIAL PROCESSING FOR NOCTOURNAL ARCHIVES
			if ($aws_domain == "nocturnalarchives.com"){
				// CHECK FOR "-nosort"	IF ITS NOT THERE DO AUTOSORT
				$temp_slug = "xxx-".$temp_slug."-xxx";
				if (strpos($pre_temp_slug,"-nosort") == false){
					include "include-meme-cats-nocturnalarchives-com.php";
				}
			}
		}


		//IF THERE IS A DEFAULT MEME AUTHOR UPDATE IT
		if($post_is_meme == true){
			if ($GLOBALS['meme_author_id'] <> "") {
				//$aws_debug_flag = true;
				$querystr = "UPDATE wp_posts SET post_author = '".$GLOBALS['meme_author_id']."' WHERE (ID = '".$id."' )";
				if ($aws_debug_flag){echo "<br>querystr ".$querystr;}
				$wpdb->query($querystr); //update the db
			}
		}


	}
}


// 2.9.0 Housekeeping functions

//  2.9.1 AutoptimizeCache Cleanup
if (class_exists('autoptimizeCache')) { // 2.9.1.Automatically clear autoptimizeCache if it goes beyond 256MB
    $myMaxSize = 256000; # You may change this value to lower like 100000 for 100MB if you have limited server space
    $statArr=autoptimizeCache::stats();
    $cacheSize=round($statArr[1]/1024);
    if ($cacheSize>$myMaxSize){
       autoptimizeCache::clearall();
       header("Refresh:0"); # Refresh the page so that autoptimize can create new cache files and it does breaks the page after clearall.
    }
}


// 3.0 AMP

//    3.1.0 AMP Filters & Actions
if ($adsense_publisher_id != "" AND is_front_page() == False){ // if we have an Adsense publisher ID then add the AMP ads
		add_filter( 'amp_post_template_data', 'isa_load_amp_adsense_script' ); //3.2.1 Add AMP Ad JS include
		add_action('ampforwp_below_the_title', 'after_title_text', 11 );	 //    3.2.4 Add AMP Ad Adsense After Title
		add_action( 'pre_amp_render_post', 'isa_amp_add_content_filter_above' ); //    3.2.2 Add AMP Ad Adsense Under Featured Image
		add_action( 'pre_amp_render_post', 'isa_amp_add_content_filter_alt' ); //    3.2.3 -  Add Google Adsense code to AMP within the content at multiple place*/

}

//    3.2.0 AMP Function Library

//    3.2.1 Add AMP Ad JS include
//Plugin requires the Wordpress/Automatic AMP Plugin https://wordpress.org/plugins/amp/ OR https://wordpress.org/plugins/accelerated-mobile-pages/ */
function isa_load_amp_adsense_script( $data ) {
    $data['amp_component_scripts']['amp-ad'] = 'https://cdn.ampproject.org/v0/amp-ad-0.1.js';
    return $data;
}

//    3.2.2 Add AMP Ad Adsense Under Featured Image
function isa_amp_add_content_filter_above () {
    add_filter( 'the_content', 'isa_amp_adsense_above_content' );
}
function isa_amp_adsense_above_content($content) {
	global $post;
	if (!has_tag('noadsense')){
    	if ($GLOBALS['ad_slot_featured'] != ""){
        	// Adsense ad code
				//If AMP Display AMP Ad else Display Normal AD
				return '<amp-ad width="100vw" height=320 type="adsense" data-ad-client="' . $publisher_id . '" data-ad-slot="' . $ad_slot . '" data-auto-format="rspv" data-full-	width><div overflow></div></amp-ad>' . $content;
			}else{
			return $content;
    	}
    }else{
	    return $content;
    }
}


//    3.2.3 -  Add Google Adsense code to AMP within the content at multiple place*/
function isa_amp_add_content_filter_alt() {
    add_filter( 'the_content', 'isa_amp_adsense_within_multiple' );
}
function isa_amp_adsense_within_multiple( $content ) {
    $ad_units = $GLOBALS['ad_units'];
    $insertions = array();
    foreach ( $ad_units as $paragraph => $ad_slot ) {
        $insertions[ $paragraph ] = '<amp-ad width="100vw" height="320" type="adsense" data-ad-client="' . $GLOBALS['adsense_publisher_id'] . '" data-ad-slot="' . $ad_slot . '" data-auto-format="rspv" data-full-width><div overflow></div></amp-ad>';
    }
    // Insert Adsense ad after multiple paragraphs
    $new_content = isa_insert_after_paragraph_multiple( $insertions, $content );
    return $new_content;
}
function isa_insert_after_paragraph_multiple( $insertions = array(), $content ) {
    $closing_p = '</p>';
    $paragraphs = explode( $closing_p, $content );
    foreach ($paragraphs as $index => $paragraph) {
        if ( trim( $paragraph ) ) {
            $paragraphs[$index] .= $closing_p;
        }
        // insert ad at multiple places
        foreach ( $insertions as $paragraph_id => $ad_code ) {
            if ( $paragraph_id === $index + 1 ) {
                $paragraphs[$index] .= $ad_code;
            }
        }
    }
    return implode( '', $paragraphs );
}

//    3.2.4 -  Add Google Adsense code to AMP after the post title
function after_title_text() {
	if ($GLOBALS['ad_slot_utitle'] != ""){
			// Adsense ad code
			//If AMP Display AMP Ad else Display Normal AD
			echo '<amp-ad width="100vw" height=320 type="adsense" data-ad-client="' . $publisher_id . '" data-ad-slot="' . $ad_slot . '" data-auto-format="rspv" data-full-width><div overflow></div></amp-ad>';
	}
}

function remove_date($post_info) {
	//$post_info = 'by [post_author_posts_link] [post_comments] [post_edit]';
	$post_info = "";
	return $post_info;
}

function displayadditionalcss(){
	if($GLOBALS['additionalcss'] != ""){
		echo "<style>".$GLOBALS['additionalcss']."</style>";
	}
}

// 4.0.0 is in website-data.php
// 4.0.1 is in website-data.php
// 4.0.2 is in website-data.php
// 4.0.3 is in website-data.php





?>
