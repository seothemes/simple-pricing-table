<?php
/**
 * This file enqueues scripts and styles for the plugin.
 *
 * @package SimplePricingTable
 */

add_action( 'admin_enqueue_scripts', 'seo_slider_admin_scripts_styles', 100 );
/**
 * Load admin scripts and styles.
 */
function seo_slider_admin_scripts_styles() {
	if ( get_current_screen()->id === 'simple_pricing_table' || get_current_screen()->id === 'edit-simple_pricing_table' ) {
		// Enqueue admin CSS.
		wp_enqueue_style( 'simple-pricing-table', plugin_dir_url( __FILE__ ) . 'assets/styles/admin.css' );
	}
}

add_action( 'wp_enqueue_scripts', 'spt_column_classes_css' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function spt_column_classes_css() {
	if ( false === apply_filters( 'spt_column_classes_css', false ) ) {
		return;
	}

	wp_enqueue_style( 'spt-column-classes', plugins_url( '/assets/styles/column-classes.css', __DIR__ ) );
}

add_action( 'wp_head', 'spt_inline_css' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function spt_inline_css() {
	if ( false === apply_filters( 'spt_inline_css', true ) ) {
		return;
	}

	global $post;

	$breakpoint = apply_filters( 'spt_breakpoint', '896' );
	$css_file   = spt_minify_css( file_get_contents( dirname( __DIR__ ) . '/assets/styles/column-classes.css' ) );

	if ( has_shortcode( $post->post_content, 'pricing_table' ) || has_shortcode( $post->post_excerpt, 'pricing_table' ) ) {

	    printf( '<style id="spt-column-classes">@media(min-width:%spx){%s}</style>', $breakpoint, $css_file );

	}
}
