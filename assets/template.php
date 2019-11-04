<?php
/**
 * Template for expandable list module
 *
 * $this is an instance of the Expandable_List object.
 *
 * Available properties:
 * $this->list_items (array) Items with title and content for each item in the list.
 * $this->counter (int) Module index in flexible layout.
 *
 * @package Hogan
 */

declare( strict_types = 1 );
namespace Dekode\Hogan;

if ( ! defined( 'ABSPATH' ) || ! ( $this instanceof Expandable_List ) ) {
	return; // Exit if accessed directly.
}

foreach ( $this->list_items as $key => $item ) :

	$list_item_classes = array_merge(
		[ 'hogan-expandable-list-item' ],
		apply_filters( 'hogan/module/expandable_list/list_item_classes', [], $this )
	);
	$list_item_classes = trim( implode( ' ', array_filter( $list_item_classes ) ) );
	$list_item_id      = ! empty( $item['item_id'] ) ? $item['item_id'] : 'panel-' . $this->counter . '-' . $key;
	?>
	<div class="<?php echo esc_attr( $list_item_classes ); ?>">
		<a class="anchor" name="<?php echo esc_attr( $list_item_id ); ?>">&nbsp;</a>
		<a href="#<?php echo esc_attr( $list_item_id ); ?>"><?php echo esc_html( $item['item_title'] ); ?><span></span></a>
		<div aria-expanded="false">
			<?php echo $item['item_content']; // WPCS: XSS OK. ?>
		</div>
	</div>
<?php endforeach; ?>
