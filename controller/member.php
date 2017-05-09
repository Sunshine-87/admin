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
		$sexTrans = ['秘密','男','女'];
		$member['sex'] = $sexTrans[$member['sex']];
		$data['member'] = $member;
		$this->display('member/membershow.php', $data);
	}
}
?>