var searchInputOpened = false;

function showMore() {
	var pageNumber = parseInt($('.show-more').attr('page-number'));
	var requestUrl = $('.show-more').attr('data-url');
	
	$('.show-more').attr('page-number', pageNumber + 1);
	$.ajax({
		url: requestUrl + pageNumber,
		type: 'post',
		dataType: 'json',
		beforeSend: function() {
			showPreloader();
		},
		success: function(j) {
			$(j.data).insertBefore('.show-more-point');
			if (!j.enableMore) $('.show-more').hide();
			hidePreloader();
		}
	});
}

function showPreloader() {
	$('#ajax-preloader').show();
}

function hidePreloader() {
	$('#ajax-preloader').hide();
}

function disableMore() {
	$('.show-more').hide();
}

function loadContent(content) {
	$('#content-container .center-container-big').html(content);
}

function scrollToTop() {
	$('html, body').animate({
		scrollTop: 0
	}, 500);
}

function loadUrl(url) {
	$.ajax({
		url: url,
		type: 'post',
		dataType: 'json',
		cache: false,
		beforeSend: function() {
			showPreloader();
		},
		success: function(d) {
			loadContent(d.data);
			hidePreloader();
			scrollToTop();
		}
	});
	closeSearch();
}

function closeSearch() {
	$('#top-search-cnt').animate({
		'width': '24%',
	});
	searchInputOpened = false;
}

function searchObject() {
	if (!searchInputOpened) {
		$('#top-search-cnt').animate({
			'width': '85%',
		});
		searchInputOpened = true;
	} else {
		var searchText = $('#search-text').val();
		if (searchText) {
			var url = app['url'] + '/' + app['search_url'] + '/' + searchText;
			$.ajax({
				url: url,
				type: 'post',
				dataType: 'json',
				data: 'first=1',
				beforeSend: function() {
					showPreloader();
				},
				success: function(data) {
					if (data.count) loadContent(data.data);
					else loadContent(app['not_found']);
					if (!data.enableMore) disableMore();
					hidePreloader();
				}
			});
		}
	}
}

function activateMapButton() { return;
	if ($('.map-button').hasClass('button-inactive')) $('.map-button').removeClass('button-inactive');
	if (!$('.map-button').hasClass('button-active')) $('.map-button').addClass('button-active');
	
	if ($('.list-button').hasClass('button-active')) $('.list-button').removeClass('button-active');
	if (!$('.list-button').hasClass('button-inactive')) $('.list-button').addClass('button-inactive');
}

function activateListButton() { return;
	if ($('.list-button').hasClass('button-inactive')) $('.list-button').removeClass('button-inactive');
	if (!$('.list-button').hasClass('button-active')) $('.list-button').addClass('button-active');
	
	if ($('.map-button').hasClass('button-active')) $('.map-button').removeClass('button-active');
	if (!$('.map-button').hasClass('button-inactive')) $('.map-button').addClass('button-inactive');
}

function init() {
	$('.search-icon-cnt img').bind('click', searchObject);
}

$(function(){
	init();
});