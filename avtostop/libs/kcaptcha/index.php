<?php

error_reporting(0);

include('kcaptcha.php');

session_start();

$captcha = new KCAPTCHA();

//if($_REQUEST["get_key"]){
	$_SESSION['captcha_code'] = $captcha->getKeyString();
//}

?>