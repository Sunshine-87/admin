<?php
	$config = parse_ini_file('.env');
	require_once 'define.php';

	function __autoload($classname) {
		$destination = CONTROLLER.$classname.SURFIX;
		if (file_exists($destination)) {
			require_once $destination;
		} else {
			throw new Exception("Error Processing Request");
		}
	}

	$controller = $_GET['c'];
	$method = $_GET['m'];
?>