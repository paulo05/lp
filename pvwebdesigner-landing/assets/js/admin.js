(function ($) {
	'use strict';

	$(function () {
		$('.pvwd-upload-image').on('click', function (e) {
			e.preventDefault();

			var button = $(this);
			var targetId = button.data('target');
			var input = $('#' + targetId);
			var preview = $('#' + targetId + '_preview');
			var removeBtn = button.siblings('.pvwd-remove-image');

			var frame = wp.media({
				title: 'Selecionar imagem',
				button: { text: 'Usar esta imagem' },
				multiple: false,
			});

			frame.on('select', function () {
				var attachment = frame.state().get('selection').first().toJSON();
				var url = attachment.sizes && attachment.sizes.medium ? attachment.sizes.medium.url : attachment.url;

				input.val(url);
				preview.attr('src', url).show();
				removeBtn.show();
			});

			frame.open();
		});

		$('.pvwd-remove-image').on('click', function (e) {
			e.preventDefault();

			var button = $(this);
			var targetId = button.data('target');

			$('#' + targetId).val('');
			$('#' + targetId + '_preview').hide().attr('src', '');
			button.hide();
		});
	});
})(jQuery);
