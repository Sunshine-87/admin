<?php
class Controller
{
	function display($tpl = '') {
		if ($tpl != 'login.php') {
			require_once TPL.'background/meta.html';
			require_once TPL.'background/header.php';
			require_once TPL.'background/menu.php';
		}
		if (!empty($tpl)) {
			require_once TPL.$tpl;
		}
		if ($tpl != 'login.php') {
			require_once TPL.'background/footer.html';
		}
	}
}
?>