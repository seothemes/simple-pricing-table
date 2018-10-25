<?php
/**
 * This file registers the Pricing Table custom post type.
 *
 * @package SimplePricingTable Table
 */

add_action( 'init', 'spt_cpt', 0 );
/**
 * Register Custom Post Type.
 *
 * @return void
 */
function spt_cpt() {
	$labels = array(
		'name'                  => _x( 'Pricing Tables', 'Pricing Table General Name', 'simple-pricing-table' ),
		'singular_name'         => _x( 'Pricing Table', 'Pricing Table Singular Name', 'simple-pricing-table' ),
		'menu_name'             => __( 'Pricing Tables', 'simple-pricing-table' ),
		'name_admin_bar'        => __( 'Pricing Table', 'simple-pricing-table' ),
		'archives'              => __( 'Pricing Table Archives', 'simple-pricing-table' ),
		'attributes'            => __( 'Pricing Table Attributes', 'simple-pricing-table' ),
		'parent_item_colon'     => __( 'Parent Pricing Table:', 'simple-pricing-table' ),
		'all_items'             => __( 'All Pricing Tables', 'simple-pricing-table' ),
		'add_new_item'          => __( 'Add New Pricing Table', 'simple-pricing-table' ),
		'add_new'               => __( 'Add New', 'simple-pricing-table' ),
		'new_item'              => __( 'New Pricing Table', 'simple-pricing-table' ),
		'edit_item'             => __( 'Edit Pricing Table', 'simple-pricing-table' ),
		'update_item'           => __( 'Update Pricing Table', 'simple-pricing-table' ),
		'view_item'             => __( 'View Pricing Table', 'simple-pricing-table' ),
		'view_items'            => __( 'View Pricing Tables', 'simple-pricing-table' ),
		'search_items'          => __( 'Search Pricing Table', 'simple-pricing-table' ),
		'not_found'             => __( 'Not found', 'simple-pricing-table' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'simple-pricing-table' ),
		'featured_image'        => __( 'Featured Image', 'simple-pricing-table' ),
		'set_featured_image'    => __( 'Set featured image', 'simple-pricing-table' ),
		'remove_featured_image' => __( 'Remove featured image', 'simple-pricing-table' ),
		'use_featured_image'    => __( 'Use as featured image', 'simple-pricing-table' ),
		'insert_into_item'      => __( 'Insert into slide', 'simple-pricing-table' ),
		'uploaded_to_this_item' => __( 'Uploaded to this slide', 'simple-pricing-table' ),
		'items_list'            => __( 'Pricing Tables list', 'simple-pricing-table' ),
		'items_list_navigation' => __( 'Pricing Tables list navigation', 'simple-pricing-table' ),
		'filter_items_list'     => __( 'Filter slides list', 'simple-pricing-table' ),
	);
	$args   = array(
		'label'               => __( 'Pricing Table', 'simple-pricing-table' ),
		'description'         => __( 'Pricing Table Description', 'simple-pricing-table' ),
		'labels'              => $labels,
		'supports'            => array( 'title' ),
		'hierarchical'        => false,
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-editor-table',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => false,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);

	register_post_type( 'simple_pricing_table', $args );
}
