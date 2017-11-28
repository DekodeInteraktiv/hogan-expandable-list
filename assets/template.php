<?php
/**
 * Template for expandable list module
 *
 * $this is an instance of the Expandable_List object.
 *
 * @package Hogan
 */

namespace Dekode\Hogan;

if ( ! defined( 'ABSPATH' ) || ! ( $this instanceof Expandable_List ) ) {
	return; // Exit if accessed directly.
}

echo 'hei expandable list';
//echo wp_kses_post( $this->content );
