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
		$sexTrans = ['未知','男','女'];
		foreach ($member as $key => $value) {
			$member[$key]['sex'] = $sexTrans[$value['sex']];
		}
		$data['member'] = $member;
		$this->display('member/memberlist.php', $data);
	}
}
?>