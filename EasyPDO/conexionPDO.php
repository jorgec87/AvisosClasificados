<?php  
	require_once '../EasyPDO/EasyDB.php';
	require_once '../config.php';
	$db = new EasyDB($conf['db_hostname'],$conf['db_username'],$conf['db_password'],$conf['db_name']);

?>