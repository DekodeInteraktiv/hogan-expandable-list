(function () {
	var itemLinks = document.querySelectorAll('.hogan-expandable-list-item > a'),
		i, len = itemLinks.length;

	for (i = 0; i < len; i++) {
		itemLinks[i].onclick = function (evt) {
			evt.preventDefault();
			var panel = this.nextElementSibling;
			this.classList.toggle('active');
			panel.setAttribute("aria-expanded", this.classList.contains('active').toString());
			if (this.classList.contains('active')) {
				panel.style.maxHeight = panel.scrollHeight + 'px';
			} else {
				panel.style.maxHeight = '0';
			}
		}
	}
})();
