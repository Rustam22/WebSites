<?php

error_reporting (E_ALL);

include('kcaptcha.php');

session_start();

$captcha = new KCAPTCHA();

if($_REQUEST["get_key"]){
	$_SESSION['captcha_keystring'] = $captcha->getKeyString();
}

?>