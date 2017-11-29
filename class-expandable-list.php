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
		public $list_items;
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
		 */
		public function get_fields() {

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
		 * Map fields to object variable.
		 *
		 * @param array $content The content value.
		 */
		public function load_args_from_layout_content( $content ) {
			$this->heading    = $content['heading'] ?? null;
			$this->list_items = $content['list_items'];

			parent::load_args_from_layout_content( $content );
		}

		/**
		 * Validate module content before template is loaded.
		 */
		public function validate_args() {
			return ! empty( $this->list_items );
		}

		/*public function render_template( $raw_content, $counter = 0, $echo = true ) {
			parent::load_args_from_layout_content( $raw_content, $counter, $echo );
		}*/

		protected function render_opening_template_wrappers( $counter = 0 ) {
			$this->counter = $counter;
			parent::render_opening_template_wrappers( $counter );
		}
	}
}
