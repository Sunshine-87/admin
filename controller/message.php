<?php
class message extends Controller
{
	function __construct() {
		require CORE.'TBLink.php';
	}

	function qiubangzhu() {
		$qiubangzhu = new TBLink('course');
		$course = $qiubangzhu->query('select a.userid,a.id,a.title,b.nickname,a.price,a.publish_time from course as a, userinfo as b where b.id = a.userid and a.status = 0 order by publish_time desc');
		foreach ($course as $key => $value) {
			$course[$key]['publish_time'] = date('Y-m-d H:i:s',$value['publish_time']);
		}
		$data['course'] = $course;
		$this->display('message/qiubangzhu.php',$data);
	}

	function lingkuaidi() {
		$kuaidi = new TBLink('kuaidi');
		$kuaidi = $kuaidi->query('select a.userid,a.kuaidiTime,a.id,a.place,b.nickname,a.destination,a.publish_time from kuaidi as a, userinfo as b where b.id = a.userid and a.status = 0 order by publish_time desc');
		foreach ($kuaidi as $key => $value) {
			$kuaidi[$key]['publish_time'] = date('Y-m-d H:i:s',$value['publish_time']);
			if ($value['kuaidiTime'] > time()) {
				$kuaidi[$key]['passed'] = false;
			} else {
				$kuaidi[$key]['passed'] = true;
			}
		}
		$data['kuaidi'] = $kuaidi;
		$this->display('message/lingkuaidi.php',$data);
	}

	function xiaojishi() {
		$xiaojishi = new TBLink('jishi');
		$jishi = $xiaojishi->query('select a.userid,a.id,a.title,b.nickname,a.price,a.publish_time from jishi as a, userinfo as b where b.id = a.userid and a.status = 0 order by publish_time desc');
		foreach ($jishi as $key => $value) {
			$jishi[$key]['publish_time'] = date('Y-m-d H:i:s',$value['publish_time']);
		}
		$data['jishi'] = $jishi;
		$this->display('message/xiaojishi.php',$data);
	}

	function messagedel() {
		$id = $_POST['id'];
		$type = $_POST['type'];
		switch ($type) {
			case 'qiubangzhu':
				$table_name = 'course';
				break;
			case 'lingkuaidi':
				$table_name = 'kuaidi';
				break;
			case 'xiaojishi':
				$table_name = 'jishi';
				break;
			default:
				echo json_encode(array('status' => 2, 'msg'=>'error'));
				exit;
				break;
		}
		$qiubangzhu = new TBLink($table_name);
		$del = $qiubangzhu->update([['status',-2]])->where([['id',$id]])->get();
		if ($del) {
			$data = array('status' => 1, 'msg'=>'success');
		} else {
			$data = array('status' => 2, 'msg'=>'error');
		}
		echo json_encode($data);
	}
}
?>