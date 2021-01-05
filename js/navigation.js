jQuery( function ( $ ) {
	$(document).ready(function () {
		$('#menu-toggle').click(function() {
			$('#menu-dropdown').toggle(200);
		})

		$('#menu-dropdown a').click(function(event) {
			event.preventDefault();

			var id = $(this).attr('href');

			if ($(id).length) {
				// Scroll to section
				var offset = 20;

				$('html, body').animate({
					scrollTop: $(id).offset().top + offset
				}, 500);

				$('#menu-dropdown').toggle(200);
			} else {
				var targetUrl = window.location.protocol + "//" + window.location.host + '/' + id;
				window.location.href = targetUrl;
			}
		})
	});
});
