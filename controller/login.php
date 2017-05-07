<?php
class login extends Controller
{
	function __construct() {
		require CORE.'TBLink.php';
		$this->userinfo = new TBLink('userinfo');
	}

	function index() {
		$this->display();
	}

	function login() {
		if (isset($_POST['us'])&&isset($_POST['ps'])) {
			$username = $_POST['us'];
			$password = $_POST['ps'];
		} else {
			$test = $this->userinfo->where(array(['nickname','徐博恒']))->get();
			var_dump($test);
		}
	}
}
?>