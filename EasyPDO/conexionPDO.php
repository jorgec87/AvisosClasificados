<?php  
	require_once $_SERVER['DOCUMENT_ROOT'].'/my_garve/EasyPDO/EasyDB.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/my_garve/config.php';
	$db = new EasyDB($conf['db_hostname'],$conf['db_username'],$conf['db_password'],$conf['db_name']);

?>