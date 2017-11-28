<?php
/**
 * Expandable List module class
 *
 * @package Hogan
 */

namespace Dekode\Hogan;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( '\\Dekode\\Hogan\\Expandable_List' ) && class_exists( '\\Dekode\\Hogan\\Module' ) ) {

	/**
	 * Expandable List module class.
	 *
	 * @extends Modules base class.
	 */
	class Expandable_List extends Module {

		/**
		 * List of expandable items.
		 *
		 * @var $items
		 */
		public $items;

		/**
		 * Module constructor.
		 */
		public function __construct() {

			$this->label    = __( 'Expandable List', 'hogan-expandable-list' );
			$this->template = __DIR__ . '/assets/template.php';

			parent::__construct();
		}

		/**
		 * Field definitions for module.
		 */
		public function get_fields() {

			$fields = [];

			// Heading field can be disabled using filter hogan/module/expandable_list/heading/enabled (true/false).
			hogan_append_heading_field( $fields, $this );


			//TODO: Repeater with Q & As
			/*$fields[] = [
				'type'         => 'wysiwyg',
				'key'          => $this->field_key . '_content',
				'name'         => 'content',
				'label'        => __( 'Add content', 'hogan-expandable-list' ),
				'delay'        => true,
				'required'     => true,
				'tabs'         => apply_filters( 'hogan/module/expandable_list/content/tabs', 'all' ),
				'media_upload' => 0,
				'toolbar'      => apply_filters( 'hogan/module/expandable_list/content/toolbar', 'hogan' ),
			];*/

			return $fields;
		}

		/**
		 * Map fields to object variable.
		 *
		 * @param array $content The content value.
		 */
		public function load_args_from_layout_content( $content ) {
			$this->heading = $content['heading'] ?? null;
			$this->items = trim( $content['items'] );

			parent::load_args_from_layout_content( $content );
		}

		/**
		 * Validate module content before template is loaded.
		 */
		public function validate_args() {
			return ! empty( $this->items );
		}
	}
}
