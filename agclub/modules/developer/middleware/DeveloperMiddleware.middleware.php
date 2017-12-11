<?php

    class DeveloperMiddleware extends Controller {
        public static function initializeDeveloper() {
            BaseModel::connect();
            self::$smarty->setTemplateDir(Application::$modules['developer']['folder'] . ds . 'views');
			self::$smarty->caching = 0;
            self::$smarty->assign('static_url', Application::$modules['developer']['static_url']);
			self::$smarty->assign('public_url', self::$_app['public_url']);
            self::$smarty->assign('app_url', Application::$settings['url']);
            self::$smarty->assign('developer_title', 'developer');
        }

    }

?>
