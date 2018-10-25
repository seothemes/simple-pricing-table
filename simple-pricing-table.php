<?php
/**
 * Plugin Name: Simple Pricing Table
 * Plugin URI:  https://seothemes.com/plugins/simple-pricing-table
 * Description: A simple and lightweight, search engined optimized, accessible and mobile * responsive pricing table plugin.
 * Author:      SEO Themes
 * Author URI:  https://seothemes.com
 * Version:     1.0.0
 * Text Domain: simple-pricing-table
 * Domain Path: /languages
 * License:     GNU General Public License v2.0 (or later)
 * License URI: http://www.opensource.org/licenses/gpl-license.php
 *
 * @package     SimplePricingTable
 * @link        https://seothemes.com/plugins/simple-pricing-table
 * @author      Seo Themes
 * @copyright   Copyright © 2018 Seo Themes
 * @license     GPL-2.0+
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Load CMB2 library.
require_once( 'cmb2/init.php' );

// Load helper functions.
require_once( 'includes/helpers.php' );

// Load slider metabox settings.
require_once( 'includes/settings.php' );

// Load slider custom post type.
require_once( 'includes/cpt.php' );

// Load slider shortcode.
require_once( 'includes/shortcode.php' );

// Load slider widget.
require_once( 'includes/widget.php' );

// Load scripts and styles.
require_once( 'includes/enqueue.php' );
