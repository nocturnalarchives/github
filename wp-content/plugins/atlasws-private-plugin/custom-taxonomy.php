<?
//CUSTOM TAXONOMY MODULE Ver: 1.0.0.1
// fold
//
// endfold





// 5.0.0.1 - Establish Taxonomies
// fold

// Add custom taxonomies
// fold
/*
 * Additional custom taxonomies can be defined here
 * http://codex.wordpress.org/Function_Reference/register_taxonomy
 * https://www.smashingmagazine.com/2012/01/create-custom-taxonomies-wordpress/
 */
// endfold

function add_custom_taxonomies() {
  // Add new "Locations" taxonomy to Posts
    register_taxonomy('display-controler', 'post', array(
    // Hierarchical taxonomy (like categories)
    'hierarchical' => true,
    // This array of options controls the labels displayed in the WordPress Admin UI
    'labels' => array(
      'name' => _x( 'Display Control', 'taxonomy general name' ),
      'singular_name' => _x( 'Display Controler', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Display Controlers' ),
      'all_items' => __( 'All Display Controls' ),
      'parent_item' => __( 'Parent Display Control' ),
      'parent_item_colon' => __( 'Parent Display Control:' ),
      'edit_item' => __( 'Edit Display Controler' ),
      'update_item' => __( 'Update Display Controler' ),
      'add_new_item' => __( 'Add New Display Controler' ),
      'new_item_name' => __( 'New Display Controler Name' ),
      'menu_name' => __( 'Display Controler' ),
    ),
    // Control the slugs used for this taxonomy
    'rewrite' => array(
      'slug' => 'display-control', // This controls the base slug that will display before each term
      'with_front' => false, // Don't display the category base before "/display-control/"
      'hierarchical' => true // This will allow URL's like "/display-control/boston/cambridge/"
    ),
  ));
}
add_action( 'init', 'add_custom_taxonomies', 0 );
// endfold



?>