<?php
	require_once 'comm.php';
	$config = parse_ini_file('.env');
	require_once 'define.php';

	$Auth = new Auth();
	$login = $Auth->checkLogin();

	$c = isset($_GET['c']) ? $_GET['c'] : 'index';
	$method = isset($_GET['m']) ? $_GET['m'] : 'index';
	
	// if ($c!='login' || $method!='index') {
	// 	if (!$login) {
	// 		skip('index.php?c=login&m=index');
	// 		exit;
	// 	}
	// }
	
	$controller = new $c();
	try {
		$controller -> $method();
	} catch (Exception $e) {
		throw $e;
	}
	
?>