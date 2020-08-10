<?php
/**
 * Plugin Name: Hogan Module: Expandable List
 * Plugin URI: https://github.com/dekodeinteraktiv/hogan-expandable-list
 * GitHub Plugin URI: https://github.com/dekodeinteraktiv/hogan-expandable-list
 * Description: Expandable List Module for Hogan
 * Version: 1.2.0
 * Author: Dekode
 * Author URI: https://dekode.no
 * License: GPL-3.0
 * License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
 *
 * Text Domain: hogan-expandable-list
 * Domain Path: /languages/
 *
 * @package Hogan
 * @author Dekode
 */

declare( strict_types = 1 );
namespace Dekode\Hogan\Expandable_List;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action( 'plugins_loaded', __NAMESPACE__ . '\\hogan_load_textdomain' );
add_action( 'hogan/include_modules', __NAMESPACE__ . '\\register_module', 10, 1 );
add_filter( 'acf/update_value/key=hogan_module_expandable_list_item_id', __NAMESPACE__ . '\\sanitize_item_id_on_save', 10, 3 );

/**
 * Register module text domain
 */
function hogan_load_textdomain() {
	\load_plugin_textdomain( 'hogan-expandable-list', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

/**
 * Register module in Hogan
 *
 * @param \Dekode\Hogan\Core $core Hogan Core instance.
 * @return void
 */
function register_module( \Dekode\Hogan\Core $core ) {
	require_once 'class-expandable-list.php';
	$core->register_module( new \Dekode\Hogan\Expandable_List() );
}

/**
 * Sanitize item id name to URL friendly string.
 *
 * @param string  $value Item name.
 * @param integer $id Item id.
 * @param array   $field Sanitized item name.
 * @return string
 */
function sanitize_item_id_on_save( string $value, int $id, array $field ) : string {
	return sanitize_title( $value );
}
