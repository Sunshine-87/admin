<?php
class login extends Controller
{
	function __construct() {
		require CORE.'TBLink.php';
		$this->admin = new TBLink('admin');
	}

	function index() {
		$this->display('login.php');
	}

	function login() {
		if (isset($_POST['us'])&&isset($_POST['ps'])) {
			$username = $_POST['us'];
			$password = $_POST['ps'];
			$user = $this->admin->where(array(['usnm',$username]))->first();
			if ($user['pass'] == $password) {
				session_start();
				$_SESSION['userID'] = $user['id'];
				$_SESSION['userName'] = $user['usnm'];
				skip('?c=index&m=denglurenci');
				exit;
			} else {
				skip('?c=login&m=index');
				exit;
			}
		} else {
			skip('?c=login&m=index');
			exit;
		}
	}

	function logout() {
		session_start();
		session_unset();
		skip('?c=login&m=index');
		exit;
	}
}
?>