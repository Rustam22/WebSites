<?php 
	error_reporting(E_ALL);
	
	define('app_root', realpath('.'));
	define('ds', DIRECTORY_SEPARATOR);
	define('core_path', app_root . ds . 'core');

	$__db = Array(
        'prefix' => 'vl1',
		'default' => Array(
             'user' => 'agclub_user',
            'password' => 'qaPe4re7',
            'name' => 'agclub_db',
            //'port' => '3306',
            'host' => 'localhost',
		),
		/*
		'default' => Array(
            'user' => 'vusal',
            'password' => '1',
            'name' => 'tuktuk',
            //'port' => '3306',
            'host' => 'localhost',
		),
		*/
		'meqa_server' => Array(
            'user' => 'phpdev',
            'password' => 'phpdev',
            'name' => 'mf',
            //'port' => '3306',
            'host' => '192.168.10.3',
		),
	);
	
    $appUrl = 'http://agclub.az/app';
    $siteUrl = 'http://agclub.az';
    $_adminName = 'admin';
	
	$__app = Array(
            'url' => $appUrl,
            'debug' => false,
			'url_converter_enabled' => false,
			'use_session' => true,
            'controllers_folder' => app_root . ds . 'controllers',
            'controllers_ext' => '.controller.php',
			'libs_folder' => app_root . ds . 'libs',
            'middleware_folder' => app_root . ds . 'middleware',
            'middleware_ext' => '.middleware.php',
            'models_folder' => app_root . ds . 'models',
            'templates_folder' => app_root . ds . 'views',
            'static_url' => $appUrl . '/static',
			'static_files_ext' => Array('css', 'js'),
			'image_extensions' => Array('jpg', 'png', 'bmp'),
			'static_files' => Array(
				'jquery.js',
				'json.js',
				'template.js',
				'actions.js',
			),
			'static_folder' => app_root . ds . 'static',
            'libs_folder' => app_root . ds . 'libs',
            'middleware_list' => Array(
                Array('Middleware','initializeApp'),
				Array('Middleware','forSmarty'),
				//Array('Middleware','getLangsUrl'),
				//Array('Middleware','getMenu'),
				//Array('Middleware','getNewsList'),
				//Array('Middleware','getIbanners'),
            ),
			'smtp' => Array(
				'host' => '127.0.0.1',
				'user' => 'notreply@meqa.az',
				'password' => 'ylperton'
			),
			'lpw' => Array(
				'from' => 'notreply@meqa.az',
				'fromName' => 'atib.az',
			),
            'public_folder' => app_root . ds . 'public',
			'public_url' => $siteUrl . '/public',
            'languages' => Array(
                'az' => 'Azərbaycan',
                'ru' => 'Русский',
				'en' => 'English',
            ),
            'language_file_folder' => app_root . ds . 'messages',
            'page_count' => 10,
            'default_language' => 'az',
			'autoload_folders' => Array(
				
				// models
				Array(app_root . ds . 'models','model'),
				Array(app_root . ds . 'models' . ds . 'content','model'),
				Array(app_root . ds . 'models' . ds . 'menu','model'),
				Array(app_root . ds . 'models' . ds . 'filemanager','model'),
				Array(app_root . ds . 'models' . ds . 'admin-users','model'),
				Array(app_root . ds . 'models' . ds . 'site-users','model'),
				Array(app_root . ds . 'models' . ds . 'banners','model'),
				Array(app_root . ds . 'models' . ds . 'menu','model'),
				Array(app_root . ds . 'models' . ds . 'category','model'),
				Array(app_root . ds . 'models' . ds . 'news','model'),
				Array(app_root . ds . 'models' . ds . 'products','model'),
				Array(app_root . ds . 'models' . ds . 'orders','model'),
				Array(app_root . ds . 'models' . ds . 'ibanner','model'),
				Array(app_root . ds . 'models' . ds . 'objects','model'),
				Array(app_root . ds . 'models' . ds . 'horoscope','model'),
				Array(app_root . ds . 'models' . ds . 'feedback','model'),
				Array(app_root . ds . 'models' . ds . 'call-to','model'),
				Array(app_root . ds . 'models' . ds . 'search','model'),
				Array(app_root . ds . 'models' . ds . 'service-network','model'),
				Array(app_root . ds . 'models' . ds . 'get-link','model'),
				Array(app_root . ds . 'models' . ds . 'application-form','model'),
				Array(app_root . ds . 'models' . ds . 'announcements','model'),
				Array(app_root . ds . 'models' . ds . 'b-offers','model'),
				Array(app_root . ds . 'models' . ds . 'text-banner','model'),
				Array(app_root . ds . 'models' . ds . 'photogallery','model'),
				Array(app_root . ds . 'models' . ds . 'videogallery','model'),
				Array(app_root . ds . 'models' . ds . 'image-banner','model'),
				Array(app_root . ds . 'models' . ds . 'block-banners','model'),
				Array(app_root . ds . 'models' . ds . 'files','model'),
				
				// controllers
				Array(app_root . ds . 'controllers','controller'),
				Array(app_root . ds . 'modules' . ds . $_adminName . ds . 'controllers', 'controller'),
				Array(app_root . ds . 'controllers' . ds . 'utils', 'controller'),
				Array(app_root . ds . 'controllers' . ds . 'app', 'controller'),
				Array(app_root . ds . 'controllers' . ds . 'content', 'controller'),
				Array(app_root . ds . 'controllers' . ds . 'auth', 'controller'),
				Array(app_root . ds . 'controllers' . ds . 'registration', 'controller'),
				Array(app_root . ds . 'controllers' . ds . 'horoscope', 'controller'),
				Array(app_root . ds . 'controllers' . ds . 'feedback', 'controller'),
				Array(app_root . ds . 'controllers' . ds . 'profile', 'controller'),
				Array(app_root . ds . 'controllers' . ds . 'call_to', 'controller'),
				Array(app_root . ds . 'controllers' . ds . 'search', 'controller'),
				Array(app_root . ds . 'controllers' . ds . 'application-form', 'controller'),
				Array(app_root . ds . 'controllers' . ds . 'announcements', 'controller'),
				Array(app_root . ds . 'controllers' . ds . 'b-offers', 'controller'),
				Array(app_root . ds . 'controllers' . ds . 'photogallery', 'controller'),
				
				// middleware
				Array(app_root . ds . 'middleware','middleware'),
				
				// forms
				Array(app_root . ds . 'forms','form'),
				Array(app_root . ds . 'modules' . ds . $_adminName . ds . 'forms','form'),
			),
			'classes_to_synchronize' => Array(
				'AdminUsersModel',
				'AdminUsersGroupModel',
				'NewsModel',
				//'NewsCommentsModel',
				'BannersModel',
				'SiteUsersModel',
				//'ObjectsModel',
				//'HoroscopeZodiacModel',
				//'HoroscopeMonthModel',
				'FeedbackModel',
				//'CallToModel',
				//'IBannerCategoriesModel',
				//'IBannerItemsModel',
				'SearchModel',
				//'ServicesNetworkModel',
				'ApplicationFormModel',
				'AnnouncementsModel',
				'BusinessOffersModel',
				'TextBannerModel',
				'PhotoGalleryCategoryModel',
				'PhotoGalleryPhotoModel',
				'VideoGalleryCategoryModel',
				'VideoGalleryVideoModel',
				'ImageBannerModel',
				'BlocksBannersModel',
				'FilesModel'
			),
			'image_extensions' => Array('jpg', 'jpeg', 'png', 'gif', 'bmp'),
			'allowed_extensions' => Array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'txt', 'doc', 'docx', 'xls', 'xlsx', 'pdf'),
			
			
	);
        
		$_developFolder = 'developer';
        
        $__modules = Array(/*
            'admin' => Array(
				'version' => '8.0',
                'folder' => app_root . ds . 'modules' . ds . $_adminName,
                'static_url' => $appUrl . '/modules/' . $_adminName . '/static',
				'static_folder' => app_root . ds . 'modules' . ds . $_adminName . ds . 'static',
				'messages_folder' => app_root . ds . 'modules' . ds . $_adminName . ds . 'messages',
				'static_files' => Array(
					'jquery.js',
					'lang.az.js',
					'date-controller.js',
					'json.js',
					'template.js',
					'taskbar.js',
					'tab-controller.js',
					'checkbox-controller.js',
					'select-controller.js',
					'scrollbar-controller.js',
					'scrollbar-dragger.js',
					'desktop.js',
					'dragger.js',
					'resizer.js',
					'tree-dragger.js',
					'window.js',
					'tree.js',
					'filemanager.js',
					'utils.js',
					'main.js',
				),
                'name' => $_adminName,
                'middleware_list' => Array(
					Array('AdminMiddleware','initializeAdmin'),
					Array('AdminMiddleware','checkLoggedIn'),
					Array('AdminMiddleware','authorized'),
                ),
                'middleware_folder' => app_root . ds . 'modules' . ds . $_adminName . ds . 'middleware',
                'controllers_folder' => app_root . ds . 'modules' . ds . $_adminName . ds . 'controllers',
                'models' => Array(
					'FileManager',
					//'CategoryRelationsModel',
					'MenuRelationsModel',
					//'ProductModel',
					//'OrdersModel',
					'AdminUsersModel',
					'AdminUsersGroupModel',
					'NewsModel',
					//'NewsCommentsModel',
					//'BannersModel',
					//'ObjectsRelationsModel',
					//'HoroscopeZodiacModel',
					//'HoroscopeMonthModel',
					'SiteUsersModel',
					'FeedbackModel',
					//'CallToModel',
					//'IBannerCategoriesModel',
					//'IBannerItemsModel',
					//'ServicesNetworkModel',
					'GetPageAddressModel',
					'AnnouncementsModel',
					'BusinessOffersModel',
					'ApplicationFormModel',
					'TextBannerModel',
					'PhotoGalleryCategoryModel',
					'PhotoGalleryPhotoModel',
					'VideoGalleryCategoryModel',
					'VideoGalleryVideoModel',
					'ImageBannerModel',
					'BlocksBannersModel',
					'FilesModel'
                ),
				'tree_models' => Array(
					0 => Array(
						'CategoryRelationsModel',
						'CategoryModel',
						'1'
					),
					1 => Array(
						'MenuRelationsModel',
						'MenuModel',
						'2'
					),
					2 => Array(
						'ObjectsRelationsModel',
						'ObjectsModel',
						'8'
					)
				),
            ),
			'developer' => Array(
                'folder' => app_root . ds . 'modules' . ds . $_developFolder,
				'static_folder' => app_root . ds . 'modules' . ds . $_developFolder . ds . 'static',
                'static_url' => $appUrl . '/modules/' . $_developFolder . '/static',
                'name' => $_developFolder,
                'middleware_list' => Array(
					Array('DeveloperMiddleware', 'initializeDeveloper'),
                ),
                'middleware_folder' => app_root . ds . 'modules' . ds . $_developFolder . ds . 'middleware',
                'controllers_folder' => app_root . ds . 'modules' . ds . $_developFolder . ds . 'controllers',
            ),*/
        );

	$__template = Array(
            'debug' => $__app['debug'],
	);

	require core_path . ds . 'main.php';

?>