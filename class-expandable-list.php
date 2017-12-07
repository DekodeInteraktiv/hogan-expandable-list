<?php
/**
 * Expandable List module class
 *
 * @package Hogan
 */

declare( strict_types = 1 );
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
		 * @var array $items
		 */
		public $list_items;

		/**
		 * Module index in flexible layout
		 *
		 * @var int $counter
		 */
		public $counter;

		/**
		 * Module constructor.
		 */
		public function __construct() {

			$this->label    = __( 'Expandable List', 'hogan-expandable-list' );
			$this->template = __DIR__ . '/assets/template.php';

			if ( true === apply_filters( 'hogan/module/expandable_list/load_assets', true ) ) {
				add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_assets' ] );
			}

			parent::__construct();
		}

		/**
		 * Field definitions for module.
		 *
		 * @return array $fields Fields for this module
		 */
		public function get_fields() : array {

			$fields = [];

			// Heading field can be disabled using filter hogan/module/expandable_list/heading/enabled (true/false).
			hogan_append_heading_field( $fields, $this );

			$fields[] =
				[
					'type'         => 'repeater',
					'key'          => $this->field_key . '_list_items',
					'label'        => __( 'List Items', 'hogan-expandable-list' ),
					'name'         => 'list_items',
					'instructions' => esc_html__( 'Create a list of expandable items', 'hogan-expandable-list' ),
					'min'          => 1,
					'max'          => 0,
					'layout'       => 'block',
					'button_label' => __( 'Add item', 'hogan-expandable-list' ),
					'sub_fields'   => [
						[
							'type'         => 'text',
							'key'          => $this->field_key . '_item_title',
							'label'        => esc_html__( 'Title', 'hogan-expandable-list' ),
							'name'         => 'item_title',
							'instructions' => esc_html__( 'Add list item title', 'hogan-expandable-list' ),
						],
						[
							'type'         => 'wysiwyg',
							'key'          => $this->field_key . '_item_content',
							'name'         => 'item_content',
							'label'        => __( 'Expandable content', 'hogan-expandable-list' ),
							'instructions' => esc_html__( 'Add list item expandable content', 'hogan-expandable-list' ),
							'delay'        => false,
							'required'     => true,
							'tabs'         => apply_filters( 'hogan/module/expandable_list/content/tabs', 'all' ),
							'media_upload' => 0,
							'toolbar'      => apply_filters( 'hogan/module/expandable_list/content/toolbar', 'hogan_caption' ),
						],
					],
				];

			return $fields;
		}

		/**
		 * Enqueue module assets
		 */
		public function enqueue_assets() {

			$_version = defined( 'SCRIPT_DEBUG' ) && true === SCRIPT_DEBUG ? time() : false;
			if ( true === apply_filters( 'hogan/module/expandable_list/load_styles', true ) ) {
				wp_enqueue_style( 'hogan-expandable-list-styles', plugins_url( '/assets/styles.css', __FILE__ ), [], $_version );
			}

			if ( true === apply_filters( 'hogan/module/expandable_list/load_scripts', true ) ) {
				wp_enqueue_script( 'hogan-expandable-list-scripts', plugins_url( '/assets/scripts.js', __FILE__ ), [], $_version, true );
			}
		}

		/**
		 * Map raw fields from acf to object variable.
		 *
		 * @param array $raw_content Content values.
		 * @param int   $counter Module location in page layout.
		 * @return void
		 */
		public function load_args_from_layout_content( array $raw_content, int $counter = 0 ) {

			$this->list_items = $raw_content['list_items'];
			$this->counter = $counter;

			parent::load_args_from_layout_content( $raw_content, $counter );
		}

		/**
		 * Validate module content before template is loaded.
		 *
		 * @return bool Whether validation of the module is successful / filled with content.
		 */
		public function validate_args() : bool {
			return ! empty( $this->list_items );
		}
	}
}
