<?php   
	
	date_default_timezone_set('Asia/Baku');

    require_once core_path . ds . "require.php";
	
	function errorHandler($errno, $errstr, $errfile, $errline) {
		echo '<div style="padding: 10px; background-color: #333; border: solid 1px #ff0000; color: #fff; font-weight: bold;">' .
            ' Error: ' . $errstr . '<br /> File: ' . $errfile . ' ; on line: ' . $errline . '; <br/> No: ' . $errno . '</div><br />';
	}
	
	set_error_handler('errorHandler');
	Smarty::muteExpectedErrors();

	function loadClasses($class) {
	Global $__app;
		$f = $__app['autoload_folders'];
		$c = count($f);
		for ($i = 0; $i < $c; $i++) {
			if (file_exists($f[$i][0] . ds . $class . '.' . $f[$i][1] . '.php')) {
				require_once $f[$i][0] . ds . $class . '.' . $f[$i][1] . '.php';
				break;
			}
		}
	}
	
	register_shutdown_function( "fatalHandler" );
	
	function fatalHandler() {
		// send mail to developer
	}
	
	//try {
		spl_autoload_register('loadClasses');
		Application::start();
	//}
	//catch (Exception $e) {
		
		//header('Location: ' . $__app['url'] . '/' . 'error.html');
	//}
	/*
	echo '<!--';
	echo 'Query count : ' . BaseModel::$queryCount;
	echo '-->';
	*/
	
?>