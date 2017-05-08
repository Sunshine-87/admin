<?php
	require_once 'comm.php';
	$config = parse_ini_file('.env');
	require_once 'define.php';

	date_default_timezone_set('PRC');

	$Auth = new Auth();
	$login = $Auth->checkLogin();

	$c = isset($_GET['c']) ? $_GET['c'] : 'index';
	$method = isset($_GET['m']) ? $_GET['m'] : 'index';
	
	if ($c!='login') {
		if (!$login) {
			skip('?c=login&m=index');
			exit;
		}
	}

	if ($c == 'index' && $method == $c) {
		$method = 'denglurenci';
	}

	$controller = new $c();

	try {
		$controller -> $method();
	} catch (Exception $e) {
		throw new Exception("Wrong M");
	}
	
?>