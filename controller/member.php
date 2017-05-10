<?php
class member extends Controller
{
	function __construct() {
		require CORE.'TBLink.php';
		$this->userinfo = new TBLink('userinfo');
	}

	function membershow() {
		$id = $_GET['id'];
		$member = $this->userinfo->where([['id',$id]])->first();
		$sexTrans = ['未知','男','女'];
		$member['sex'] = $sexTrans[$member['sex']];
		$data['member'] = $member;
		$this->display('member/membershow.php', $data);
	}

	function memberlist() {
		$member = $this->userinfo->get();
		$member = $this->transSex($member);
		$data['member'] = $member;
		$this->display('member/memberlist.php', $data);
	}

	function membertobebanned() {
		$course = new TBLink('course');
		$kuaidi = new TBLink('kuaidi');
		$jishi = new TBLink('jishi');
		$list = [$course,$kuaidi,$jishi];
		$mtbb = array();
		foreach ($list as $table) {
			$mtbbintable = $table->select(['userid'])->where([['status',-2]])->get();
			foreach ($mtbbintable as $mtbbintable) {
				if (!in_array($mtbbintable['userid'], $mtbb)) {
					array_push($mtbb, $mtbbintable['userid']);
				}
			}
		}
		$where = array();
		foreach ($mtbb as $mtbb) {
			array_push($where, array(0 => array('id',$mtbb), 1 => array('status',0)));
		}
		foreach ($where as $orwhere) {
			$this->userinfo->orwhere($orwhere);
		}
		$mtbb = $this->userinfo->get();
		$mtbb = $this->transSex($mtbb);
		$data['mtbb'] = $mtbb;
		$this->display('member/membertobebanned.php', $data);
	}

	function memberhasbeenbanned() {
		$mhbb = $this->userinfo->where([['status',-1]])->get();
		$mhbb = $this->transSex($mhbb);
		$data['mhbb'] = $mhbb;
		$this->display('member/memberhasbeenbanned.php', $data);
	}

	function open() {
		$course = new TBLink('course');
		$kuaidi = new TBLink('kuaidi');
		$jishi = new TBLink('jishi');
		$list = [$course,$kuaidi,$jishi];
		$id = (int)$_POST['id'];
		$account = $this->userinfo->where([['status',-1],['id',$id]])->get();
		if (count($account) == 1) {
			foreach ($list as $table) {
				$table->update([['status',-3]])->where([['userid',$id],['status',-2]])->get();
			}
			$rs = $this->userinfo->update([['status',0]])->get();
			if ($rs == true) {
				$data = array('status' => 1, 'msg' => 'success');
			} else {
				$data = array('status' => 2, 'msg' => 'error');
			}
		} else {
			$data = array('status' => 3, 'msg' => 'error');
		}
		echo json_encode($data);
	}

	function ban() {
		$id = (int)$_POST['id'];
		$rs = $this->userinfo->update([['status',-1]])->where([['id',$id]])->get();
		if ($rs == true) {
			$data = json_encode(array('status' => 1, 'msg' => 'success'));
		} else {
			$data = json_encode(array('status' => 2, 'msg' => 'error'));
		}
		echo $data;
	}

	function transSex($member) {
		$sexTrans = ['未知','男','女'];
		if (!empty($member)) {
			foreach ($member as $key => $value) {
				$member[$key]['sex'] = $sexTrans[$value['sex']];
			}
		}
		return $member;
	}
}
?>