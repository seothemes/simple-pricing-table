<?php
/**
 * This file registers the settings for the plugin.
 *
 * @package SimplePricingTable
 */

add_action( 'cmb2_admin_init', 'spt_register_metabox' );
/**
 * Register simple_pricing_table metaboxes.
 */
function spt_register_metabox() {

	// Field prefix.
	$prefix = 'spt_';

	/**
	 * Repeatable Field Groups.
	 *
	 * Displays in the main context of the Edit Pricing Table screen. The
	 * parent field's id needs to be passed as the first argument.
	 */
	$simple_pricing_tables_group = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Pricing Table', 'simple-pricing-table' ),
		'object_types' => array( 'simple_pricing_table' ),
	) );

	// Add simple_pricing_tables repeater field.
	$group_field_id = $simple_pricing_tables_group->add_field( array(
		'id'          => $prefix . 'columns',
		'type'        => 'group',
		'description' => '',
		'options'     => array(
			'group_title'   => __( 'Column {#}', 'simple-pricing-table' ),
			'add_button'    => __( 'Add Column', 'simple-pricing-table' ),
			'remove_button' => __( 'Remove Column', 'simple-pricing-table' ),
			'sortable'      => true,
		),
	) );

	// Add image field to simple_pricing_tables repeater field.
	$simple_pricing_tables_group->add_group_field( $group_field_id, array(
		'name'        => __( 'Featured', 'simple-pricing-table' ),
		'id'          => $prefix . 'featured',
		'type'        => 'checkbox',
		'description' => __( 'Check this box to feature this column.', 'simple-pricing-table' ),
	) );

	// Add image field to simple_pricing_tables repeater field.
	$simple_pricing_tables_group->add_group_field( $group_field_id, array(
		'name'        => __( 'Name', 'simple-pricing-table' ),
		'id'          => $prefix . 'name',
		'type'        => 'text',
		'attributes'  => array(
			'placeholder' => 'e.g. Small Business',
		),
		'description' => __( 'Enter your product name or plan name here.', 'simple-pricing-table' ),
	) );

	// Add image field to simple_pricing_tables repeater field.
	$simple_pricing_tables_group->add_group_field( $group_field_id, array(
		'name'        => __( 'Pricing', 'simple-pricing-table' ),
		'id'          => $prefix . 'pricing',
		'type'        => 'text',
		'attributes'  => array(
			'placeholder' => 'e.g. $49/mo',
		),
		'description' => __( 'Enter your pricing options here.', 'simple-pricing-table' ),
	) );

	// Add content field to simple_pricing_tables repeater field.
	$simple_pricing_tables_group->add_group_field( $group_field_id, array(
		'name'        => __( 'Features', 'simple-pricing-table' ),
		'id'          => $prefix . 'features',
		'type'        => 'textarea_small',
		'description' => __( 'Enter your features here (one per line).', 'simple-pricing-table' ),
		'attributes'  => array(
			'placeholder' => "Feature 1\nFeature 2\nFeature 3\nFeature 4",
		),
	) );

	// Add image field to simple_pricing_tables repeater field.
	$simple_pricing_tables_group->add_group_field( $group_field_id, array(
		'name'        => __( 'Button Text', 'simple-pricing-table' ),
		'id'          => $prefix . 'button_text',
		'type'        => 'text',
		'description' => __( 'Enter your call to action text here.', 'simple-pricing-table' ),
		'attributes'  => array(
			'placeholder' => 'e.g. Add to Cart',
		),
	) );

	// Add image field to simple_pricing_tables repeater field.
	$simple_pricing_tables_group->add_group_field( $group_field_id, array(
		'name'        => __( 'Button URL', 'simple-pricing-table' ),
		'id'          => $prefix . 'button_url',
		'type'        => 'text_url',
		'description' => __( 'Enter your call to action URL here. This is usually either a payment link (e.g. PayPal) or a page where users can create an account.', 'simple-pricing-table' ),
		'attributes'  => array(
			'placeholder' => 'e.g. https://example.com/sign-up',
		),
	) );

	/**
	 * Initiate the metabox for simple_pricing_table settings.
	 *
	 * Displays in the side context of the Edit Pricing Table screen.
	 */
	$simple_pricing_table_settings = new_cmb2_box( array(
		'id'           => $prefix . 'settings',
		'title'        => __( 'Pricing Table Settings', 'simple-pricing-table' ),
		'object_types' => array( 'simple_pricing_table' ),
		'context'      => 'side',
		'priority'     => 'default',
		'show_names'   => true,
	) );

	/*
	// Add overlay color field.
	$simple_pricing_table_settings->add_field( array(
		'name'    => __( 'Overlay color', 'simple-pricing-table' ),
		'id'      => $prefix . 'overlay',
		'type'    => 'colorpicker',
		'default' => apply_filters( 'spt_default_overlay', 'rgba(10,20,30,0.2)' ),
		'options' => array(
			'alpha' => true,
		),
	) );

	// Add text color field.
	$simple_pricing_table_settings->add_field( array(
		'name'    => __( 'Text color', 'simple-pricing-table' ),
		'id'      => $prefix . 'text',
		'type'    => 'colorpicker',
		'default' => apply_filters( 'spt_default_text', '#ffffff' ),
		'options' => array(
			'alpha' => true,
		),
	) );

	// Add title field.
	$simple_pricing_table_settings->add_field( array(
		'name' => 'Display settings',
		'desc' => '',
		'id'   => $prefix . 'display',
		'type' => 'title',
	) );

	// Add dots field.
	$simple_pricing_table_settings->add_field( array(
		'name'    => '',
		'desc'    => 'Display dots',
		'id'      => $prefix . 'dots',
		'type'    => 'checkbox',
		'default' => spt_set_checkbox_default( true ),
	) );

	// Add arrows field.
	$simple_pricing_table_settings->add_field( array(
		'name'    => '',
		'desc'    => 'Display arrows',
		'id'      => $prefix . 'arrows',
		'type'    => 'checkbox',
		'default' => spt_set_checkbox_default( true ),
	) );

	// Add loop field.
	$simple_pricing_table_settings->add_field( array(
		'name'    => '',
		'desc'    => 'Loop simple_pricing_table',
		'id'      => $prefix . 'loop',
		'type'    => 'checkbox',
		'default' => spt_set_checkbox_default( true ),
	) );

	// Add autoplay field.
	$simple_pricing_table_settings->add_field( array(
		'name'    => '',
		'desc'    => 'Enable autoplay',
		'id'      => $prefix . 'autoplay',
		'type'    => 'checkbox',
		'default' => spt_set_checkbox_default( true ),
	) );

	// Add fade field.
	$simple_pricing_table_settings->add_field( array(
		'name'    => 'Effect',
		'desc'    => '',
		'id'      => $prefix . 'effect',
		'type'    => 'radio_inline',
		'default' => 'simple_pricing_table',
		'options' => array(
			'false' => __( 'Pricing Table', 'cmb2' ),
			'true'  => __( 'Fade', 'cmb2' ),
		),
	) );

	// Add duration field.
	$simple_pricing_table_settings->add_field( array(
		'name'       => __( 'Duration (ms)', 'simple-pricing-table' ),
		'desc'       => '',
		'id'         => $prefix . 'duration',
		'type'       => 'text',
		'default'    => apply_filters( 'spt_default_duration', '5000' ),
		'attributes' => array(
			'type'    => 'number',
			'pattern' => '\d*',
		),
	) );

	// Add transition field.
	$simple_pricing_table_settings->add_field( array(
		'name'       => __( 'Transition (ms)', 'simple-pricing-table' ),
		'desc'       => '',
		'id'         => $prefix . 'transition',
		'type'       => 'text',
		'default'    => apply_filters( 'spt_default_transition', '1000' ),
		'attributes' => array(
			'type'    => 'number',
			'pattern' => '\d*',
		),
	) );

	// Add height field.
	$simple_pricing_table_settings->add_field( array(
		'name'       => __( 'Height mobile (px)', 'simple-pricing-table' ),
		'desc'       => '',
		'id'         => $prefix . 'mobile',
		'type'       => 'text',
		'default'    => apply_filters( 'spt_default_height', '600' ),
		'attributes' => array(
			'type'    => 'number',
			'pattern' => '\d*',
		),
	) );

	// Add height field.
	$simple_pricing_table_settings->add_field( array(
		'name'       => __( 'Height desktop (px)', 'simple-pricing-table' ),
		'desc'       => '',
		'id'         => $prefix . 'desktop',
		'type'       => 'text',
		'default'    => apply_filters( 'spt_default_height', '600' ),
		'attributes' => array(
			'type'    => 'number',
			'pattern' => '\d*',
		),
	) );
	 * */

	// Add shortcode field.
	$simple_pricing_table_settings->add_field( array(
		'name'       => __( 'Shortcode', 'simple-pricing-table' ),
		'id'         => $prefix . 'shortcode',
		'type'       => 'text',
		'column'     => array(
			'position' => 2,
			'name'     => 'Shortcode',
		),
		'attributes' => array(
			'readonly' => '',
			'onClick'  => 'this.select();',
		),
		'default_cb' => 'spt_set_shortcode_id',
	) );
}

/**
 * Only return default value if we don't have a post ID (in the 'post' query variable).
 *
 * @param  bool $default On/Off (true/false).
 *
 * @return mixed Returns true or '', the blank default.
 */
function spt_set_checkbox_default( $default ) {
	return isset( $_GET['post'] ) ? '' : ( $default ? (string) $default : '' );
}

/**
 * Set post ID for shortcode.
 *
 * @param  array $args  Field args.
 * @param  array $field Field object.
 *
 * @return string
 */
function spt_set_shortcode_id( $args, $field ) {
	$id = $field->args['attributes']['data-postid'] = $field->object_id;

	return sprintf( '[pricing_table id="%s"]', $id );
}
