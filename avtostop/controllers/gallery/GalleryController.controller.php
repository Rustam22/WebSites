<?php

	class GalleryController extends Controller {
		
		public static function listAll($r, $v) {
			
			$pageId = 9;
			$lang = $v['lang'];
			$page = MenuModel::get($pageId, $lang);
			
			$path = MenuModel::getPath($pageId, $lang);
			$pathItems = MenuModel::getItemsRId($lang);
			
			$gallery = PhotoGalleryPhotoModel::all();
			
			self::renderTemplate('gallery' . ds . 'list.tpl', Array(
					'page' => $page,
					'path' => $path,
					'pathItems' => $pathItems,
					'csrf_token' => Application::getCSRFKey(),
					'gallery' => $gallery
			));
			
		}
		
	}

?>