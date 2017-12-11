<?php 
	
	error_reporting(E_ALL);
	
	define('app_root', realpath('.'));
	define('ds', DIRECTORY_SEPARATOR);
	define('core_path', app_root . ds . 'core');
	
	
	$__db = Array(
        'prefix' => 'vl1',
		'default' => Array(
            'user' => 'root',
            'password' => '',
            'name' => 'agclub',
            //'port' => '3306',
            'host' => 'localhost',
		),

	);
	
    $appUrl = 'http://localhost/agclub';
    $_adminName = 'admin';
	
	$__app = Array(
            'url' => $appUrl,
            'debug' => false,
			'url_converter_enabled' => false,
			'use_session' => true,
            'controllers_folder' => app_root . ds . 'controllers',
            'controllers_ext' => '.controller.php',
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
				Array('Middleware','getSliderItems'),
				Array('Middleware','getLangsUrl'),
				Array('Middleware','getMenu'),
				Array('Middleware','getHoroscopeForMonth'),
				Array('Middleware','callTo'),
				Array('Middleware','getIbanners'),
            ),
			'smtp' => Array(
				'host' => 'mail.meqa.az',
				'user' => 'notreply@meqa.az',
				'password' => 'ylperton'
			),
			'lpw' => Array(
				'from' => 'notreply@meqa.az',
				'fromName' => 'agclub.az',
			),
            'public_folder' => app_root . ds . 'public',
			'public_url' => $appUrl . '/public',
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
				Array(app_root . ds . 'models' . ds . 'guests','model'),
				
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
				'NewsCommentsModel',
				'BannersModel',
				'SiteUsersModel',
				'ObjectsModel',
				'HoroscopeZodiacModel',
				'HoroscopeMonthModel',
				'FeedbackModel',
				'CallToModel',
				'IBannerCategoriesModel',
				'IBannerItemsModel',
				'SearchModel',
				'ServicesNetworkModel',
				'GuestsModel',
			),
			'image_extensions' => Array('jpg', 'jpeg', 'png', 'gif', 'bmp'),
			'allowed_extensions' => Array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'txt', 'doc', 'docx', 'xls', 'xlsx', 'pdf'),
			
			// zodiac signs for horoscope model
			'zodiac' => Array(
				'az' => Array(
					1 => 'Qoç',
					2 => 'Buğa',
					3 => 'Əkizlər',
					4 => 'Xərçəng',
					5 => 'Şir',
					6 => 'Qız',
					7 => 'Tərəzi',
					8 => 'Əqrəb',
					9 => 'Oxatan',
					10 => 'Oğlaq',
					11 => 'Dolça',
					12 => 'Balıq'
				),
				'ru' => Array(
					1 => 'Qoç',
					2 => 'Buğa',
					3 => 'Əkizlər',
					4 => 'Xərçənglər',
					5 => 'Şir',
					6 => 'Qızlar',
					7 => 'Tərəzilərlə',
					8 => 'Əqrəblər',
					9 => 'Oxatanın',
					10 => 'Oğlaqlar',
					11 => 'Dolçanın',
					12 => 'Balıqlar'
				),
				'en' => Array(
					1 => 'Qoç',
					2 => 'Buğa',
					3 => 'Əkizlər',
					4 => 'Xərçənglər',
					5 => 'Şir',
					6 => 'Qızlar',
					7 => 'Tərəzilərlə',
					8 => 'Əqrəblər',
					9 => 'Oxatanın',
					10 => 'Oğlaqlar',
					11 => 'Dolçanın',
					12 => 'Balıqlar'
				),
			),
			'month' => Array(
				'az' => Array(
					'1' => 'Yanvar',
					'2' => 'Fevral',
					'3' => 'Mart',
					'4' => 'Aprel',
					'5' => 'May',
					'6' => 'İyun',
					'7' => 'İyul',
					'8' => 'Avqust',
					'9' => 'Sentyabr',
					'10' => 'Oktyabr',
					'11' => 'Noyabr',
					'12' => 'Dekabr',
				),
				'ru' => Array(
					'1' => 'Yanvar',
					'2' => 'Fevral',
					'3' => 'Mart',
					'4' => 'Aprel',
					'5' => 'May',
					'6' => 'İyun',
					'7' => 'İyul',
					'8' => 'Avqust',
					'9' => 'Sentyabr',
					'10' => 'Oktyabr',
					'11' => 'Noyabr',
					'12' => 'Dekabr',
				),
				'en' => Array(
					'1' => 'Yanvar',
					'2' => 'Fevral',
					'3' => 'Mart',
					'4' => 'Aprel',
					'5' => 'May',
					'6' => 'İyun',
					'7' => 'İyul',
					'8' => 'Avqust',
					'9' => 'Sentyabr',
					'10' => 'Oktyabr',
					'11' => 'Noyabr',
					'12' => 'Dekabr',
				)
			)
	);
        
		$_developFolder = 'developer';
        
        $__modules = Array(
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
					'CategoryRelationsModel',
					'MenuRelationsModel',
					//'ProductModel',
					//'OrdersModel',
					'AdminUsersModel',
					'AdminUsersGroupModel',
					'NewsModel',
					'NewsCommentsModel',
					//'BannersModel',
					'ObjectsRelationsModel',
					'HoroscopeZodiacModel',
					'HoroscopeMonthModel',
					'SiteUsersModel',
					//'FeedbackModel',
					'CallToModel',
					'IBannerCategoriesModel',
					'IBannerItemsModel',
					'ServicesNetworkModel',
					'GetPageAddressModel',
					'GuestsModel'
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
            )/*,
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