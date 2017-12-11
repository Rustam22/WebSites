<?php

	class VideoGalleryController extends Controller {
	
		public static function view($requestm, $vars) {
			$lang = Application::$storage['lang'];
			$photos = VideoGalleryCategoryModel::getVideos($lang);
			$context = Array();
			$context['photos'] = $photos;
			self::renderTemplate('videogallery' . ds . 'videogallery.tpl', $context);
		}
		
		public static function getVideo($request, $vars) {
			$videoId = $vars['video_id'];
			$video = VideoGalleryVideoModel::get($videoId);
			echo $video->iframe->value;
		}
	
	}

?>