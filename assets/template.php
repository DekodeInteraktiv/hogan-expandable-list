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
?>

<?php foreach ( $this->list_items as $key => $item ) :

	$list_item_classes = array_merge(
		[ 'hogan-expandable-list-item' ],
		apply_filters( 'hogan/module/expandable_list/list_item_classes', [], $this )
	);
	$list_item_classes = trim( implode( ' ', array_filter( $list_item_classes ) ) );
	$item_id = 'panel-' . $this->counter . '-' . $key;
	?>
	<div class="<?php echo $list_item_classes; ?>">
		<a href="#<?php echo $item_id; ?>"><?php echo esc_html( $item['item_title'] ); ?><span></span></a>
		<div id="<?php echo $item_id; ?>"
			 aria-expanded="false"><?php echo wp_kses_post( $item['item_content'] ); ?></div>
	</div>
<?php endforeach; ?>
