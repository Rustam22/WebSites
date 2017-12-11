<?php

function smarty_function_toupper($params, $template)
{
	$s = $params['string'];
	$s = str_replace(array('İ','Ə','Ç','Ş','I','Ü','Ö'), array('i','ə','ç','ş','ı','ü','ö'), $s);
	$s = strtolower($s);
	$s = str_replace(array('i','ə','ç','ş','ı','ü','ö'), array('İ','Ə','Ç','Ş','I','Ü','Ö'), $s);
    return strtoupper($s);
}

?>