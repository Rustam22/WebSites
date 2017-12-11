<?php

	class AdviceController extends Controller {
		
		public static function view($r, $v) {
			
			$lang = $v['lang'];
			$pageId = 8;
			
			$page = MenuModel::get($pageId, $lang);
			
			$path = MenuModel::getPath($pageId, $lang);
			$pathItems = MenuModel::getItemsRId($lang);
			
			
			$id = $v['r_id'];
			
			$advice = AdvicesModel::getToView($lang, $id);
			
			if ($advice === false) ApplicationController::pageNotFound($r, $v);
			
			self::renderTemplate('content' . ds . 'advice-view.tpl', Array(
				'advice' => $advice,
				'page' => $page,
				'path' => $path,
				'pathItems' => $pathItems,
			));
			
		}
		
		public static function listAll($r, $v) {
			
			$page = $v['page'];
			
			$limit = 10;
			
			$advices = AdvicesModel::getListToView($page, $limit);
			
			$pages = ceil($advices['c'] / $limit);
			
			$lang = $v['lang'];
			$pageId = 8;
			
			$pageM = MenuModel::get($pageId, $lang);
			
			$path = MenuModel::getPath($pageId, $lang);
			$pathItems = MenuModel::getItemsRId($lang);
			
			self::renderTemplate('content' . ds . 'advices.tpl', Array(
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
			
			self::renderTemplate('content' . ds . 'avto-advices.tpl', Array(
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
		
		public static function viewAvto($r, $v) {
			
			$lang = $v['lang'];
			$id = $v['r_id'];
			
			$advice = AvtoAdvicesModel::getToView($lang, $id);
			
			$pageId = 4;
			
			$pageM = MenuModel::get($pageId, $lang);
			
			$path = MenuModel::getPath($pageId, $lang);
			$pathItems = MenuModel::getItemsRId($lang);
			
			if ($advice === false) ApplicationController::pageNotFound($r, $v);
			
			self::renderTemplate('content' . ds . 'advice-view.tpl', Array(
				'advice' => $advice,
				'page' => $pageM,
				'path' => $path,
				'pathItems' => $pathItems,
			));
		}

        //auto advices
        public static function getAllAutoAdvices() {
            $start = $_POST['start'];
            $end = $_POST['end'];
            $result = AvtoAdvicesModel::getAllAutoAdvices('az', $start, $end);
            foreach($result as $key => $value) {
                $result[$key]['content'] = "<style>
                                                iframe{pointer-events:none;}
                                            </style>
                                            <script type='text/javascript'>
                                                $('body').on( 'click', '.info_block_inside p, .info_block_inside p span', function( event ) {
                                                    var clicked = $(this);
                                                    event.preventDefault();
                                                    var name = clicked.children().last().prop('tagName');
                                                    //alert(name);
                                                    if(name == 'IFRAME') {
                                                        window.location.href = clicked.children().last().attr('src');
                                                    }
                                                });
                                            </script>".$result[$key]['content'];
                break;
            }
            echo json_encode($result);
        }
        public static function getAutoAdvicesCount() {
            $result = AvtoAdvicesModel::getAutoAdvicesCount('az');
            echo $result[0]["COUNT(`id`)"];
        }

        //advices
        public static function getAllAdvices() {
            $start = $_POST['start'];
            $end = $_POST['end'];
            $result = AdvicesModel::getAllAutoAdvices('az', $start, $end);
            echo json_encode($result);
        }
        public static function getAdvicesCount() {
            $result = AdvicesModel::getAdvicesCount('az');
            echo $result[0]["COUNT(`id`)"];
        }

        //Get Registration data by search results
        public static function getAllRegData() {
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $result = RegistrationModel::getAllRegData($email, $phone);

            //echo "<pre>"; print_r($result); echo "</pre>";
           /* echo "<script>
                     console.log(".json_encode($result).");
                  </script>";*/

            echo json_encode($result);
        }
            public static function getAllLogData() {
                $status = "";
                $status = $_POST['status'];
                $side = $_POST['side'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $date1 = $_POST['date1'];
                $date2 = $_POST['date2'];
                $result = LogModel::getAllLogData($email, $phone, $date1, $date2, $side, $status);

                //echo "<pre>"; print_r($result); echo "</pre>";
                /* echo "<script>
                          console.log(".json_encode($result).");
                       </script>";*/

                echo json_encode($result);
            }

	}
?>