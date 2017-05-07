<?php
	function skip($path) {
		header('Location:'.$path);
	}

	function __autoload($classname) {
		$destination = CONTROLLER.$classname.SURFIX;
		if (file_exists($destination)) {
			require_once $destination;
		} else {
			throw new Exception("Wrong C");
		}
	}
?>