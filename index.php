<?php
	$config = parse_ini_file('.env');
	require_once 'define.php';

	function __autoload($classname) {
		$destination = CONTROLLER.$classname.SURFIX;
		if (file_exists($destination)) {
			require_once $destination;
		} else {
			throw new Exception("Wrong C");
		}
	}
	$Auth = new Auth();
	$Auth -> checkLogin();

	$c = $_GET['c'] ? $_GET['c'] : 'index';
	$method = $_GET['m'] ? $_GET['m'] : 'index';
	$controller = new $c();
	try {
		$controller -> $method();
	} catch (Exception $e) {
		throw new Exception("Wrong M");
	}
	
?>