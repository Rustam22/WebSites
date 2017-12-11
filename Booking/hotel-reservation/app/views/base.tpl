<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>{block name="page-title"}Base{/block}</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<!--<link type="text/css" href="http://code.jquery.com/mobile/latest/jquery.mobile.min.css" rel="stylesheet" />-->
		<link rel="stylesheet" type="text/css" href="{$static_url}/css/stylesheets.css" />
		<script>
			var app = [];
			app['url'] = '{$app_url}';
			app['search_url'] = 'search/object';
			app['not_found'] = '<p align="center" class="font20 txt-green">Sorgunuza uyğun ticarət obyekti tapılmadı. <a href="{$app_url}" class="font24 txt-color-red">Bələdçi.</a></a>';
		</script>
	</head>
	<body>
		
		<div id="top-container" class="fixed width100">
			<div id="top-center" class="relative">
				<div id="top-title" class="left font36 relative">
					<a href="{$app_url}"><img src="{$static_url}/img/title.png" style="width: 100px;" /></a>
					<div class="absolute hide" id="ajax-preloader">
					<img src="{$static_url}/img/loading.gif" class="width100" />
					</div>
				</div>
				<div id="top-search-cnt" class="left absolute">
					<div class="width100">
						<input type="text" id="search-text" class="width100" />
						<div class="search-icon-cnt absolute">
							<img src="{$static_url}/img/search-icon.png" class="width100" />
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div id="top-line"></div>
		</div>
		
		
		<div id="header-container" class="width100 fixed">
			<div class="center-container">
				<div class="left map-button header-button">
					<a href="javascript:loadUrl('{$app_url}/map')" style="text-decoration: none;">
						<div class="button-container">
							<div class="left button-icon"><img src="{$static_url}/img/map-icon.png" class="width100" /></div>
							<div class="left font20 button-text bold">{$messages.common.mbapp_map}</div>
							<div class="clear"></div>
						</div>
					</a>
				</div>
				<div class="left list-button header-button">
					<a href="javascript:loadUrl('{$app_url}/main');" style="text-decoration: none;">
						<div class="button-container">
							<div class="left button-icon"><img src="{$static_url}/img/info-icon.png" class="width100" /></div>
							<div class="left font20 button-text bold">{$messages.common.mbapp_tour}</div>
							<div class="clear"></div>
						</div>
					</a>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		
		<div class="width100" id="top-margin"></div>
		
		<div id="content-container" class="width100">
			<div class="center-container-big">
			{block name="content"}{/block}
			</div>
		</div>
		
		<!-- scripts -->
		<script src="{$static_url}/js/jquery.js"></script>
		<!--<script src="http://code.jquery.com/mobile/latest/jquery.mobile.min.js"></script>-->
		<script src="{$static_url}/js/actions.js"></script>
		<!-- scripts end -->
		
	</body>
</html>