function HorizontalSliderController(identifier) {
	
	var self = $(identifier),
		sliderToLeftButton = self.find('.horizontal-slider-to-left'),
		sliderToRightButton = self.find('.horizontal-slider-to-right'),
		sliderWrapper = self.find('.horizontal-slider-wrapper'),
		sliderRibbon = self.find('.horizontal-slider-ribbon'),
		sliderItemId = '.horizontal-slider-item',
		orientation = 1;
	
	var slider = {};
	
	init();
	
	function init() {
		//sliderToLeft.css('visibility', 'hidden');
		slider.left = 0;
		slider.index = 0;
		slider.havePointers = false;
		onResize();
		
		sliderToLeftButton.click(slideToLeft);
		sliderToRightButton.click(slideToRight);
		
		if (self.find('.horizontal-slider-pointers').length) {
			self.find('.horizontal-slider-pointer').click(navigateToPointer);
			slider.havePointers = true;
			slider.pointers = $(identifier).find('.horizontal-slider-pointer');
			//correctSliderPointers(0);
		}
		setInterval(slideNext, 5000);
	}
	
	function onResize() {
		var sliderItem = $(identifier).find(sliderItemId);
		var sliderItemWidth = parseInt(sliderItem.width()) + 
			parseInt(sliderItem.css('margin-left')) +
			parseInt(sliderItem.css('margin-right')) +
			parseInt(sliderItem.css('padding-left')) +
			parseInt(sliderItem.css('padding-right'));
		
		slider.width = sliderItemWidth * sliderItem.length;
		slider.wrapperWidth = parseInt(sliderWrapper.width());
		slider.itemWidth = sliderItemWidth;
		slider.left = parseInt(slider.left - (slider.left % slider.itemWidth));
		//slideTo(slider.left);
	}
	
	// actions
	
	function navigateToPointer() {
		var diff = $(this).index() - slider.index;
		slider.index = $(this).index();
		slideTo(-parseInt(diff * slider.itemWidth), 10);
	}
	
	function correctSliderPointers(currentIndex) {
		if (!slider.havePointers) return;
		$(slider.pointers.get(currentIndex)).find('.pointer-active').addClass('hide');
		$(slider.pointers.get(currentIndex)).find('.pointer-inactive').removeClass('hide');
		
		$(slider.pointers.get(slider.index)).find('.pointer-active').removeClass('hide');
		$(slider.pointers.get(slider.index)).find('.pointer-inactive').addClass('hide');
	}
	
	function correctSliderButtons() {
		if (slider.left < 0) sliderToLeftButton.css('visibility', 'visible');
		else sliderToLeftButton.css('visibility', 'hidden');
		if ((slider.left + slider.width) > slider.wrapperWidth) sliderToRightButton.css('visibility', 'visible');
		else sliderToRightButton.css('visibility', 'hidden');
	}
	
	function slideToLeft() {
		if (slider.left < 0) {
			slideTo(slider.itemWidth, 10);
		}
	}
	
	function slideToRight() {
		if ((slider.left + slider.width) > slider.wrapperWidth) {
			slideTo(-slider.itemWidth, -10);
		}
	}
	
	function slideNext() {
		try {
		var currentIndex = parseInt(Math.abs(slider.left) / slider.itemWidth);
		if (currentIndex == (slider.pointers.length - 1)) {
			slideTo(-slider.left, 10);
		} else slideToRight();
		} catch(e){}
	}
	
	function slideTo(left, infelicity) {
		var currentIndex = parseInt(Math.abs(slider.left) / slider.itemWidth);
		slider.index = parseInt(Math.abs(slider.left + left) / slider.itemWidth);
		slider.left += left;
		sliderRibbon.animate({
			left: (slider.left + infelicity) + 'px'
		}, 500, function() {
			sliderRibbon.animate({
				left: slider.left + 'px'
			}, 100, function() {
				correctSliderButtons();
				correctSliderPointers(currentIndex);
			});
		});
	}
	
	return {
		onResize: function() {
			onResize();
		}
	}
}