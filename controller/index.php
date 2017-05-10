<?php
class index extends Controller
{
	function __construct() {
		require CORE.'TBLink.php';
	}

	function denglurenci() {
		$rihuo = new TBLink('rihuo');
		$rs = $rihuo->query('SELECT * FROM rihuo order by date desc limit 7');
		$i = 0;
		while ($rs[6]['date'] != date('Y-m-d',strtotime('-6 day'))) {
			$trans = '-'.$i.' day';
			$date = date('Y-m-d', strtotime($trans));
			$rihuo = new TBLink('rihuo');
			$rrs = $rihuo->where([['date',$date]])->get();
			if (count($rrs) == 0) {
				$rihuo->insert([['login_num',0],['date',$date]]);
			}
			$rs = $rihuo->query('SELECT * FROM rihuo order by date desc limit 7');
			$i++;
		}
		$data['rihuo'] = array_reverse($rs);
		$this->display('denglurenci.php',$data);
	}

}
?>