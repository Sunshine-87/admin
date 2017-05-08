<?php
class message extends Controller
{
	function __construct() {
		require CORE.'TBLink.php';
	}

	function qiubangzhu() {
		$qiubangzhu = new TBLink('course');
		$course = $qiubangzhu->query('select a.id,a.title,b.nickname,a.price,a.publish_time from course as a, userinfo as b where b.id = a.userid and a.status = 0 order by publish_time desc');
		foreach ($course as $key => $value) {
			$course[$key]['publish_time'] = date('Y-m-d H:i:s',$value['publish_time']);
		}
		$this->display('messageList.php');
	}
}
?>