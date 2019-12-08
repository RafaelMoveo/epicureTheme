<?php
function epicure_dish_post_type(){
    $labels = array(
		'name'               => _x( 'Dishes', 'epicure' ),
		'singular_name'      => _x( 'Dish', 'post type singular name', 'epicure' ),
		'menu_name'          => _x( 'Dishes', 'admin menu', 'epicure' ),
		'name_admin_bar'     => _x( 'Dishes', 'add new on admin bar', 'epicure' ),
		'add_new'            => _x( 'Add New', 'book', 'epicure' ),
		'add_new_item'       => __( 'Add New Dish', 'epicure' ),
		'new_item'           => __( 'New Dish', 'epicure' ),
		'edit_item'          => __( 'Edit Dishes', 'epicure' ),
		'view_item'          => __( 'View Dishes', 'epicure' ),
		'all_items'          => __( 'All Dishes', 'epicure' ),
		'search_items'       => __( 'Search Dish', 'epicure' ),
		'not_found'          => __( 'No Dishes found.', 'epicure' ),
		'not_found_in_trash' => __( 'No Dishes found in Trash.', 'epicure' )
	);

	$args = array(
		'labels'             => $labels,
    'description'        => __( 'Dishes.', 'epicure' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
    'show_in_menu'       => true,
    'menu_icon'          => 'dashicons-carrot',
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'dishes' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => 6,
		'supports'           => array( 'title', 'thumbnail', 'tag' ),
		'taxonomies'          => array( 'category' ),
	);
    register_post_type('epicure_dishes', $args);
}
add_action('init', 'epicure_dish_post_type');

//Add dishes tags
add_action( 'init', 'create_dish_tags', 0 );

function create_dish_tags() 
{
  $labels = array(
    'name' => _x( 'Food Types', 'taxonomy general name' ),
    'singular_name' => _x( 'Food Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Food Types' ),
    'popular_items' => __( 'Popular Food Types' ),
    'all_items' => __( 'All Types' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Food Type' ), 
    'update_item' => __( 'Update Food Type' ),
    'add_new_item' => __( 'Add New Food Type' ),
    'new_item_name' => __( 'New Food Type Name' ),
    'separate_items_with_commas' => __( 'Separate food tupes with commas' ),
    'add_or_remove_items' => __( 'Add or remove food type' ),
    'choose_from_most_used' => __( 'Choose from the most used foos type' ),
    'menu_name' => __( 'Food Types' ),
  ); 

  register_taxonomy('tag','epicure_dishes',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'food_type' ),
  ));
}
