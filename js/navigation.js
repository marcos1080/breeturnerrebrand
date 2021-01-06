jQuery( function ( $ ) {
	$(document).ready(function () {
		$('body').click(function() {
			$('#menu-dropdown').hide(200);
		});

		$('#menu').click(function(event) {
			event.stopPropagation();
		});

		$('#menu-toggle').click(function() {
			$('#menu-dropdown').toggle(200);
		})

		$('#menu-dropdown .scroll-tag').click(function(event) {
			event.preventDefault();

			var id = $(this).attr('href');

			if ($(id).length) {
				// Scroll to section
				var offset = 50;

				$('html, body').animate({
					scrollTop: $(id).offset().top - offset
				}, 500);

				$('#menu-dropdown').toggle(200);
			} else {
				var targetUrl = window.location.protocol + "//" + window.location.host + '/' + id;
				window.location.href = targetUrl;
			}
		})
	});
});
