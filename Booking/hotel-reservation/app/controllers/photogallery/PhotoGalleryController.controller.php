<?php

	class PhotoGalleryController extends Controller {
	
		public static function view($requestm, $vars) {
			$lang = Application::$storage['lang'];
			$photos = PhotoGalleryCategoryModel::getPhotos($lang);
			$context = Array();
			$context['photos'] = $photos;
			self::renderTemplate('photogallery' . ds . 'photogallery.tpl', $context);
		}
	
	}

?>