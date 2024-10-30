<?php
/**
Plugin Name: Currency Calculator and Converter
Plugin URI: https://www.currencycalculate.com/tr/converter
Description: Crypto Currency Calculator and Converter Widget
Author: Kripto Para
Author URI: https://www.currencycalculate.com
Version: 2.6.1
*/

/**
 * Adds a new top-level menu to the bottom of the WordPress administration menu.
 */
 if( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

 if(file_exists(plugin_dir_path(__FILE__) . 'widget.php')) {
	include('widget.php');
}
