<?php
class Controller
{
	private $background = ['background/meta.html','background/header.php','background/menu.php','background/footer.html'];

	private $deny = [
	'login.php' => ['background/meta.html','background/header.php','background/menu.php','background/footer.html'],
	'member/membershow.php'=>['background/header.php','background/menu.php'],
	'message/detail.php'=>['background/header.php','background/menu.php']
	];

	function display($tpl = '', $data=array()) {
		if (!empty($data)) {
			foreach ($data as $key => $value) {
				$$key = $value;
			}
		}

		if (array_key_exists($tpl, $this->deny)) {
			$newBack = array_diff($this->background, $this->deny[$tpl]);
			if (!empty($newBack)) {
				if (isset($newBack[3])) {
					$newBack[4] = 'background/footer.html';
					$newBack[3] = $tpl;
					foreach ($newBack as $back) {
						require TPL.$back;
					}
				} else {
					foreach ($newBack as $back) {
						require TPL.$back;
					}
					require TPL.$tpl;
				}
			} else {
				require TPL.$tpl;
			}
		} else {
			$newBack = $this->background;
			$newBack[4] = 'background/footer.html';
			$newBack[3] = $tpl;
			foreach ($newBack as $back) {
				require TPL.$back;
			}
		}
	}
}
?>