(function () {

	/**
	 * List item click handler.
	 */
	function listItemClicked( event ) {
		event.preventDefault();

		// Toggle item trigger active state.
		this.classList.toggle( 'active' );

		// Toggle item panel active state.
		var panel = this.nextElementSibling;
		panel.setAttribute( 'aria-expanded', this.classList.contains( 'active' ).toString() );
		panel.style.maxHeight = this.classList.contains( 'active' ) ? panel.scrollHeight + 'px' : '0';
	};

	var itemLinks = document.querySelectorAll( '.hogan-expandable-list-item > a' );

	for ( var i = 0; i < itemLinks.length; i++ ) {
		itemLinks[ i ].onclick = listItemClicked;
	}
})();
