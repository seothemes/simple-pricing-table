=== Simple Pricing Table ===
Contributors: seothemes
Tags: pricing table
Donate link: https://seothemes.com
Requires at least: 4.9
Tested up to: 4.9.8
Requires PHP: 5.3
Stable tag: trunk
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt

Displays a lightweight pricing table optimized for search engines, accessibility and mobile devices.

== Description ==
Simple Pricing Table creates a new `pricing-table` custom post type and enables you to create multiple pricing tables with either a widget or a shortcode. There is minimal styling included with the plugin, keeping it lightweight and easy to override with your own custom CSS.

= Available Filters =

All of the plugins HTML output can be filtered to overwrite the default markup. Here is an example of how to change the heading tag:

`
add_filter( 'spt_markup_name', 'custom_pricing_table_heading');
/**
 * Change Pricing Table heading.
 */
function custom_pricing_table_heading() {
    return '<h5 class="pricing-table__name">%s</h5>';
}
`

To disable inline CSS output use the following filter:

`add_filter( 'spt_inline_css', '__return_false' );`

= Shortcode Usage =
Here is an example of the Simple Pricing Table shortcode. The pricing table ID can be found from the Edit Pricing Table screen:

`[pricing-table id="1234"]`

== Installation ==
1. Go to Plugins > Add New.
2. Type in the name of the WordPress Plugin or descriptive keyword, author, or tag in Search Plugins box or click a tag link below the screen.
3. Find the WordPress Plugin you wish to install.
4. Click Details for more information about the Plugin and instructions you may wish to print or save to help setup the Plugin.
5. Click Install Now to install the WordPress Plugin.
6. The resulting installation screen will list the installation as successful or note any problems during the install.
7. If successful, click Activate Plugin to activate it, or Return to Plugin Installer for further actions.

== Screenshots ==
1. Edit Pricing Table screen

== Frequently Asked Questions ==

= Have a question about this plugin? Let us know! =

== Changelog ==

= 1.0.0 =
* Initial release.