<?php
/**
 * This file registers the [pricing-table] shortcode.
 *
 * @package SimplePricingTable
 */

add_shortcode( 'pricing_table', 'spt_shortcode' );
/**
 * Add shortcode.
 *
 * @param  array $atts Shortcode attributes.
 *
 * @return void
 */
function spt_shortcode( $atts ) {

	// Shortcode attributes.
	$atts = shortcode_atts(
		array(
			'id' => '1',
		),
		$atts
	);

	// Slider variables.
	$id     = $atts['id'];
	$prefix = 'spt_';

	// Get pricing-table settings.
	$columns = get_post_meta( $id, $prefix . 'columns', true );

	// Set counter.
	$counter = 0;

	printf( apply_filters( 'spt_markup_open', '<div id="pricing-table-%s" class="pricing-table">' ), $id );

	foreach ( $columns as $column ) :
		$number   = count( $columns );
		$classes  = array(
			'1' => ' full-width',
			'2' => ' one-half',
			'3' => ' one-third',
			'4' => ' one-fourth',
			'5' => ' one-fifth',
			'6' => ' one-sixth',
		);
		$width    = $classes[ $number ];
		$first    = 0 === $counter ? ' first' : '';
		$featured = isset( $column['spt_featured'] ) && $column['spt_featured'] ? ' featured' : '';

		printf( apply_filters( 'spt_markup_column_open', '<div class="pricing-table__column%s">' ), $featured . $width . $first );

		if ( isset( $column['spt_name'] ) ) {
			printf( apply_filters( 'spt_markup_name', '<h3 class="pricing-table__name">%s</h3>' ), $column['spt_name'] );
		}

		if ( isset( $column['spt_pricing'] ) ) {
			printf( apply_filters( 'spt_markup_price', '<strong class="pricing-table__price">%s</strong>' ), $column['spt_pricing'] );
		}

		if ( isset( $column['spt_features'] ) ) {
			$features = explode( "\n", $column['spt_features'] );

			printf( apply_filters( 'spt_markup_features_open', '<ul class="pricing-table__features">' ) );

			foreach ( $features as $feature ) {
				printf( apply_filters( 'spt_markup_feature', '<li class="pricing-table__feature">%s</li>' ), $feature );
			}

			printf( apply_filters( 'spt_markup_features_close', '</ul>' ) );
		}

		if ( isset( $column['spt_button_url'] ) ) {
			printf( apply_filters( 'spt_markup_link_open', '<a class="pricing-table__link" href="%s">' ), $column['spt_button_url'] );

			if ( isset( $column['spt_button_text'] ) ) {
				printf( apply_filters( 'spt_markup_button', '<button class="pricing-table__button">%s</button>' ), $column['spt_button_text'] );
			}

			printf( apply_filters( 'spt_markup_link_close', '</a>' ) );
		}

		printf( apply_filters( 'spt_markup_column_close', '</div>' ) );

		$counter ++;

	endforeach;

	printf( apply_filters( 'spt_markup_close', '</div>' ) );
}
