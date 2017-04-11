function openLayer(detailType, targetId) {

	var WIDTH_DEFAULT = 450;
	var HEIGHT_DEFAULT = 500;

	var blockDetailNameN = '#' + targetId + ' .n-detail';
	var blockDetailNameS = '#' + targetId + ' .s-detail';

	var $blockN = $(blockDetailNameN);
	var $blockS = $(blockDetailNameS);

	var $layer = $('#' + targetId);
	if (!$layer) {
		return false;
	}

	var $close = $layer.find('.close');

	var pos_x = event.clientX + document.body.scrollLeft;
	var pos_y = event.clientY + document.body.scrollTop;
	var marginLeft = 0;

	var listAttr = { 'top': pos_y + 'px', 'left': pos_x, 'margin-left': marginLeft };

	switch (detailType) {
		case 's' :
			listAttr['width'] = WIDTH_DEFAULT;

			$blockN.hide();
			$blockS.show();

			break;
		case 'n' :
		case 'l' :
			if (detailType === 'l') {
				WIDTH_DEFAULT = 450;
				listAttr['width'] = WIDTH_DEFAULT;
			} else {
				WIDTH_DEFAULT = 800;
				listAttr['width'] = WIDTH_DEFAULT;
				listAttr['height'] = HEIGHT_DEFAULT;
			}

			var left = ( $(window).scrollLeft() + ($(window).width() - WIDTH_DEFAULT) / 2 );
			var top = ( $(window).scrollTop() + ($(window).height() - HEIGHT_DEFAULT) / 2 );

			listAttr['left'] = left;
			listAttr['top'] = top;

			$blockN.show();
			$blockS.hide();

			break;
		default :
			$blockN.show();
			$blockS.show();
			break;
	}

	if ($layer.is(':visible')) {
		$layer.fadeOut();
	} else {
		$layer.css(listAttr).fadeIn();
	}

	$close.bind('click', function () {
		if ($layer.is(':visible')) {
			$layer.hide();
		}
		return false;
	});
}
