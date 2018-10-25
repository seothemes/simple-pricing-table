<?php
/**
 * This file registers the `[seo_pricing-table]` shortcode.
 *
 * @package SimplePricingTable
 */

/**
 * Widget class.
 */
class Simple_Pricing_Table_Widget extends WP_Widget {

	/**
	 * Sets up the widget.
	 *
	 * @return void
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'   => 'spt_widget',
			'description' => 'Displays a pricing table in a widget.',
		);

		parent::__construct( 'spt_widget', 'Pricing Table', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param  array $args     Widget args.
	 * @param  array $instance Widget instance.
	 *
	 * @return void
	 */
	public function widget( $args, $instance ) {
		$id = get_page_by_title( $instance['pricing-table'], OBJECT, 'simple_pricing_table' )->ID;

		echo $args['before_widget'];
		echo do_shortcode( '[pricing_table id="' . absint( $id ) . '"]' );
		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin.
	 *
	 * @param  array $instance The widget options.
	 *
	 * @return void
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Pricing Table', 'simple-pricing-table' );

		?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:' ); ?></label>
            <input class="widefat"
                   id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
                   type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'pricing-table' ) ); ?>"><?php esc_html_e( 'Select Pricing Table:', 'simple-pricing-table' ); ?></label>
            <select name="<?php echo esc_attr( $this->get_field_name( 'pricing-table' ) ); ?>"
                    id="<?php echo esc_attr( $this->get_field_id( 'pricing-table' ) ); ?>"
                    class="widefat">
				<?php
				$simple_pricing_tables = new WP_Query( array(
					'post_type'   => 'simple_pricing_table',
					'numberposts' => 99,
				) );

				while ( $simple_pricing_tables->have_posts() ) :
					$simple_pricing_tables->the_post();

					$name = get_the_title();

					echo '<option value="' . esc_attr( $name ) . '" id="' . esc_attr( $name ) . '"', $instance['pricing-table'] === $name ? ' selected="selected"' : '', '>', esc_html( $name ), '</option>';

				endwhile;
				?>
            </select>
        </p>
		<?php
	}

	/**
	 * Processes widget options on save.
	 *
	 * @param  array $new_instance The new options.
	 * @param  array $old_instance The previous options.
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		foreach ( $new_instance as $key => $value ) {
			$updated_instance[ $key ] = sanitize_text_field( $value );
		}

		return $updated_instance;
	}
}

// Register the widget.
add_action( 'widgets_init', function () {
	register_widget( 'Simple_Pricing_Table_Widget' );
} );