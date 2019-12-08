<?php
function epicure_chef_post_type(){
    $labels = array(
		'name'               => _x( 'Chefs', 'epicure' ),
		'singular_name'      => _x( 'Chef', 'post type singular name', 'epicure' ),
		'menu_name'          => _x( 'Chefs', 'admin menu', 'epicure' ),
		'name_admin_bar'     => _x( 'Chefs', 'add new on admin bar', 'epicure' ),
		'add_new'            => _x( 'Add New', 'book', 'epicure' ),
		'add_new_item'       => __( 'Add New Chef', 'epicure' ),
		'new_item'           => __( 'New Chef', 'epicure' ),
		'edit_item'          => __( 'Edit Chefs', 'epicure' ),
		'view_item'          => __( 'View Chefs', 'epicure' ),
		'all_items'          => __( 'All Chefs', 'epicure' ),
		'search_items'       => __( 'Search Chef', 'epicure' ),
		'not_found'          => __( 'No Chefs found.', 'epicure' ),
		'not_found_in_trash' => __( 'No Chefs found in Trash.', 'epicure' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Chefs.', 'epicure' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-admin-users',
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'chefs' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => 6,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
	);
    register_post_type('epicure_chef', $args);
}
add_action('init', 'epicure_chef_post_type');