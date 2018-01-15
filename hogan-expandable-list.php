<?php
/**
 * Plugin Name: Hogan Module: Expandable List
 * Plugin URI: https://github.com/dekodeinteraktiv/hogan-expandable-list
 * GitHub Plugin URI: https://github.com/dekodeinteraktiv/hogan-expandable-list
 * Description: Expandable List Module for Hogan
 * Version: 1.0.5
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
add_action( 'hogan/include_modules', __NAMESPACE__ . '\\hogan_register_module' );

/**
 * Register module text domain
 */
function hogan_load_textdomain() {
	\load_plugin_textdomain( 'hogan-expandable-list', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

/**
 * Register module in Hogan
 */
function hogan_register_module() {
	require_once 'class-expandable-list.php';
	\hogan_register_module( new \Dekode\Hogan\Expandable_List() );
}
