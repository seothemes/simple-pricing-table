<?php
/**
 * This file contains helper functions for the plugin.
 *
 * @package SimplePricingTable Table
 */

/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param        $field_args
 * @param Object $field CMB2_Field.
 *
 * @return string
 */
function spt_label_tooltip_callback( $field_args, $field ) {
	$label = $field->label();

	if ( $field->option( 'tooltip' ) ) {
		$label .= '<span class="tooltip"><i>i</i>' . $field->option( 'tooltip' ) . '</span>';
	}

	return $label;
}

/**
 * Minify CSS helper function.
 *
 * @author Gary Jones
 * @link   https://github.com/GaryJones/Simple-PHP-CSS-Minification
 *
 * @param  string $css The CSS to minify.
 *
 * @return string Minified CSS.
 */
function spt_minify_css( $css ) {

	// Normalize whitespace.
	$css = preg_replace( '/\s+/', ' ', $css );

	// Remove spaces before and after comment.
	$css = preg_replace( '/(\s+)(\/\*(.*?)\*\/)(\s+)/', '$2', $css );

	// Remove comment blocks, everything between /* and */, unless preserved with /*! ... */ or /** ... */.
	$css = preg_replace( '~/\*(?![\!|\*])(.*?)\*/~', '', $css );

	// Remove ; before }.
	$css = preg_replace( '/;(?=\s*})/', '', $css );

	// Remove space after , : ; { } */ >.
	$css = preg_replace( '/(,|:|;|\{|}|\*\/|>) /', '$1', $css );

	// Remove space before , ; { } ( ) >.
	$css = preg_replace( '/ (,|;|\{|}|\(|\)|>)/', '$1', $css );

	// Strips leading 0 on decimal values (converts 0.5px into .5px).
	$css = preg_replace( '/(:| )0\.([0-9]+)(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}.${2}${3}', $css );

	// Strips units if value is 0 (converts 0px to 0).
	$css = preg_replace( '/(:| )(\.?)0(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}0', $css );

	// Converts all zeros value into short-hand.
	$css = preg_replace( '/0 0 0 0/', '0', $css );

	// Shorten 6-character hex color codes to 3-character where possible.
	$css = preg_replace( '/#([a-f0-9])\\1([a-f0-9])\\2([a-f0-9])\\3/i', '#\1\2\3', $css );

	return trim( $css );

}
