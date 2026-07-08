(function () {
	'use strict';

	document.addEventListener('DOMContentLoaded', function () {
		var revealEls = document.querySelectorAll('.pvwd-reveal');

		if ('IntersectionObserver' in window && revealEls.length) {
			var observer = new IntersectionObserver(
				function (entries) {
					entries.forEach(function (entry) {
						if (entry.isIntersecting) {
							entry.target.classList.add('pvwd-in-view');
							observer.unobserve(entry.target);
						}
					});
				},
				{ threshold: 0.12, rootMargin: '0px 0px -60px 0px' }
			);

			revealEls.forEach(function (el) {
				observer.observe(el);
			});
		} else {
			revealEls.forEach(function (el) {
				el.classList.add('pvwd-in-view');
			});
		}

		// Fecha os outros itens do FAQ ao abrir um novo.
		var faqItems = document.querySelectorAll('.pvwd-faq-item');
		faqItems.forEach(function (item) {
			item.addEventListener('toggle', function () {
				if (item.open) {
					faqItems.forEach(function (other) {
						if (other !== item) {
							other.open = false;
						}
					});
				}
			});
		});

		// Scroll suave para os links âncora do menu.
		document.querySelectorAll('.pvwd-nav a[href^="#"]').forEach(function (link) {
			link.addEventListener('click', function (e) {
				var target = document.querySelector(link.getAttribute('href'));
				if (target) {
					e.preventDefault();
					target.scrollIntoView({ behavior: 'smooth', block: 'start' });
				}
			});
		});
	});
})();
