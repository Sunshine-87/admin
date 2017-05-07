<?php
class Auth
{
	function __construct() {
		session_start();
	}

	function checkLogin() {
		if (isset($_SESSION['userID'])) {
			return true;
		} else {
			return false;
		}
	}
}
?>