<?php
	
    class ApplicationController extends Controller {
		
		public static function before($request, $vars = Array()) {
        }
		
		public static function main($request, $vars = Array()) {
			$page = 0;//$vars['page_number'];
			$limit = 12;
			$start = $page * $limit;
			
			$categories = CategoryModel::getOnlyLastCategories(0, 'itemTitle', 'az', false, $start, $limit);
			
			$count = count(CategoryModel::getOnlyLastCategories(0, 'itemTitle', 'az', true));

			$pagesCount = ceil($count / $limit);
			$enableMore = (($page) >= $pagesCount) ? false : true;

			$context = Array();
			//$context['csrf_key'] = Application::getCSRFKey();
			$context['categories'] = $categories;
			$context['enable_more'] = $enableMore;
			if (!$request->isAjax()) self::renderTemplate('main' . ds . 'main.tpl', $context);
			else {
				echo json_encode(Array(
					'data' => self::renderTemplate('main' . ds . 'main-ajax-category.tpl', $context, true),
				));
			}
        }
		
        public static function getCategories($request, $vars) {
        	$page = $vars['page_number'];
			$limit = 12;
			$start = $page * $limit;
			
			$categories = CategoryModel::getOnlyLastCategories(0, 'itemTitle', 'az', false, $start, $limit);
			
			$count = count(CategoryModel::getOnlyLastCategories(0, 'itemTitle', 'az', true));
			
			$pagesCount = ceil($count / $limit);
			$enableMore = (($page + 1) >= $pagesCount) ? false : true;

			$context = Array();
			//$context['csrf_key'] = Application::getCSRFKey();
			$context['categories'] = $categories;
			$data = self::renderTemplate('main' . ds . 'main-ajax.tpl', $context, true);
			echo json_encode(Array(
				'data' => $data,
				'enableMore' => $enableMore,
				'page' => $page,
				'pagesCount' => $pagesCount,
			));
        }

		public static function siteMap($request, $vars) {
			self::renderTemplate('sitemap' . ds . 'sitemap.tpl', Array(
				'csrf_key' => Application::getCSRFKey()
			));
		}
		
		public static function viewMap($request, $vars) {
			$context = Array(
				'map' => '<iframe width="640" height="480" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps/ms?ie=UTF8&amp;hl=ru&amp;oe=UTF8&amp;msa=0&amp;msid=212171968604658194647.0004ccdee75339a9e847d&amp;t=m&amp;ll=40.393627,49.836731&amp;spn=0.062755,0.109863&amp;z=13&amp;output=embed"></iframe><br /><small>Просмотреть <a href="https://maps.google.com/maps/ms?ie=UTF8&amp;hl=ru&amp;oe=UTF8&amp;msa=0&amp;msid=212171968604658194647.0004ccdee75339a9e847d&amp;t=m&amp;ll=40.393627,49.836731&amp;spn=0.062755,0.109863&amp;z=13&amp;source=embed" style="color:#0000FF;text-align:left">AGClub</a> на карте большего размера</small>',
			);

			echo json_encode(Array(
				'data' => self::renderTemplate('objects' . ds . 'object-map.tpl', $context, true),
			));
		}

        public static function pageNotFound() {
            self::renderTemplate('404' . ds . '404.tpl', Array(
				//'csrf_key' => Application::getCSRFKey()
			));
			die();
        }
    }
?>