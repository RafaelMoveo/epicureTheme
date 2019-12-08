<?php
function epicure_restaurant_post_type(){
    $labels = array(
		'name'               => _x( 'Restaurants', 'epicure' ),
		'singular_name'      => _x( 'Restaurant', 'post type singular name', 'epicure' ),
		'menu_name'          => _x( 'Restaurants', 'admin menu', 'epicure' ),
		'name_admin_bar'     => _x( 'Restaurants', 'add new on admin bar', 'epicure' ),
		'add_new'            => _x( 'Add New', 'book', 'epicure' ),
		'add_new_item'       => __( 'Add New Restaurant', 'epicure' ),
		'new_item'           => __( 'New Restaurant', 'epicure' ),
		'edit_item'          => __( 'Edit Restaurants', 'epicure' ),
		'view_item'          => __( 'View Restaurants', 'epicure' ),
		'all_items'          => __( 'All Restaurants', 'epicure' ),
		'search_items'       => __( 'Search Restaurant', 'epicure' ),
		'parent_item_colon'  => __( 'Parent Restaurant:', 'epicure' ),
		'not_found'          => __( 'No Restaurants found.', 'epicure' ),
		'not_found_in_trash' => __( 'No Restaurants found in Trash.', 'epicure' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Restaurants.', 'epicure' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => '' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => 6,
		'supports'           => array( 'title', 'thumbnail' ),
        'taxonomies'          => array( 'category' ),
	);
    register_post_type('epicure_restaurant', $args);
}
add_action('init', 'epicure_restaurant_post_type');