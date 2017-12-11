<?php

	class MagazineController extends Controller {

        public static function view($r, $v) {

            $lang = $v['lang'];
            $pageId = 8;

            $page = MenuModel::get($pageId, $lang);

            $path = MenuModel::getPath($pageId, $lang);
            $pathItems = MenuModel::getItemsRId($lang);


            $id = $v['r_id'];

            $advice = AdvicesModel::getToView($lang, $id);

            if ($advice === false) ApplicationController::pageNotFound($r, $v);

            self::renderTemplate('magazines' . ds . 'magazines.tpl', Array(
                'advice' => $advice,
                'page' => $page,
                'path' => $path,
                'pathItems' => $pathItems,
            ));

        }

        public static function listAll($r, $v) {

            $page = $v['page'];

            $limit = 10;

            $advices = MagazinesModel::getListToView($page, $limit);
            //echo "<pre>"; print_r($advices); echo "</pre>";
            $pages = ceil($advices['c'] / $limit);

            $lang = $v['lang'];
            $pageId = 59;

            $pageM = MenuModel::get($pageId, $lang);

            $path = MenuModel::getPath(59, $lang);
            $pathItems = MenuModel::getItemsRId($lang);

            self::renderTemplate('magazines' . ds . 'magazines.tpl', Array(
                'advices' => $advices['d'],
                'pages' => $pages,
                'page' => $page,
                'to_left' => ($page - 1) >= 0 ? ($page - 1) : 0,
                'to_right' => ($page + 1) <= ($pages - 1) ? $page + 1 : ($pages - 1),
                'page' => $pageM,
                'path' => $path,
                'pathItems' => $pathItems,
            ));

        }

        public static function listAllAvto($r, $v) {

            $page = $v['page'];

            $limit = 5;

            $lang = $v['lang'];

            $advices = AvtoAdvicesModel::getListToView($page, $limit);

            $pages = ceil($advices['c'] / $limit);

            $pageId = 4;

            $pageM = MenuModel::get($pageId, $lang);

            $path = MenuModel::getPath($pageId, $lang);
            $pathItems = MenuModel::getItemsRId($lang);

            self::renderTemplate('content' . ds . 'avto-magazines.tpl', Array(
                'advices' => $advices['d'],
                'pages' => $pages,
                'page' => $page,
                'currentPage'=>($page == 0) ? ($page+1) : $page,
                'to_left' => ($page - 1) >= 0 ? ($page - 1) : 0,
                'to_right' => (($page + 1) <= ($pages - 1)) ? $page + 1 : ($pages),
                'page' => $pageM,
                'path' => $path,
                'pathItems' => $pathItems,
            ));

        }

	}
?>